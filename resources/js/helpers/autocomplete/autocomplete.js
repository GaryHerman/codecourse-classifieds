// Default Theming for Autocomplete
import '@algolia/autocomplete-theme-classic';

import { searchClient } from './searchClient';
import { autocomplete } from "@algolia/autocomplete-js";
import { createListingsPlugin } from './_source-listings';
import { createListingsOtherPlugin } from './_source-listingsOther';

// ----------------------------------------------------------------------------------------------------
// Get listings that match search criteria
// ----------------------------------------------------------------------------------------------------

export const listingsautocomplete = (selector, {categoryId, areaIds}) => {

    // console.log(categoryId, areaIds);

    // Area Filters
    var areaFilters = 'area.id = ' + areaIds.join(' OR area.id = ');
    var areaFilters = '(' + areaFilters + ')';

    // Live Filter
    var liveFilter  = ' AND live = 1';

    // Category / Not-Category Filter
    if (typeof categoryId !== 'undefined') {
        var categoryFilter    = ' AND category.id = ' + categoryId;
        var notCategoryFilter = ' AND category.id != ' + categoryId;
        var hasCategory = true;
    } else {
        var categoryFilter    = '';
        var notCategoryFilter = '';
        var hasCategory = false;
    }

    // Plugin Filters
    const listingsOtherFilters  = areaFilters + notCategoryFilter + liveFilter;
    const listingsFilters       = areaFilters + categoryFilter + liveFilter;

    // Setup Plugin Sources for Autocomplete
    const pluginSources = [createListingsOtherPlugin(searchClient, listingsOtherFilters, hasCategory),];

    // If there is a category defined then add a section in Autocomplete with exact matches in Category as well
    if (typeof categoryId !== 'undefined') {
        pluginSources.unshift(createListingsPlugin(searchClient, listingsFilters, hasCategory));
    }

    // const listingsOther = createListingsOtherPlugin(searchClient, filters);

    return autocomplete({
        container  : selector,
        placeholder: 'Search lsitings by title, body, location, etc.',
        plugins    : pluginSources,
    });
}
