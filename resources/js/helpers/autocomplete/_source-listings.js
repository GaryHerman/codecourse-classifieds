import { getAlgoliaResults } from "@algolia/autocomplete-js";
import { html } from 'htm/preact';

export function createListingsPlugin(searchClient, filters, hasCategory) {
    // Direct matches on search criteria within area and category
    return {
        getSources ({ query }) {
            return [{
                sourceId: 'listings',
                getItems() {
                    return getAlgoliaResults({
                        searchClient,
                        queries: [
                            {
                                indexName: 'listings',
                                query,
                                params: {
                                    hitsPerPage: 5,
                                    filters: filters,
                                },
                            },
                        ],
                    });
                },
                templates: {
                    header({ items }) {
                        if (items.length === 0) {
                            return null;
                        }
                        return html`
                                    <span className="aa-SourceHeaderTitle">Top Hits In This Category</span>
                                    <div className="aa-SourceHeaderLine" />
                            `;
                    },
                    item({ item }) {
                        // console.log(item);
                        return html`
                                <span><a href="/${item.area.slug}/${item.id}">${item.title}</a> in ${item.category.name} </span><span>${item.published_at} - ${item.area.name}</span>
                            `;
                    },
                },
            }]
        }
    };
}
