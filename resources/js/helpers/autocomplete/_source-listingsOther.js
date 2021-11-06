import { getAlgoliaResults } from "@algolia/autocomplete-js";
import { html } from 'htm/preact';

export function createListingsOtherPlugin(searchClient, filters, hasCategory) {
    // Direct matches on search criteria within area and category
    return {
        getSources({ query }) {
            return [
                {
                    sourceId: 'listingsOther',
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
                            if (hasCategory !== false) {
                                return html`
                                    <span className="aa-SourceHeaderTitle">Top Hits in Other Categories</span><div className="aa-SourceHeaderLine" />
                                `;
                            }
                            return html`
                                    <span className="aa-SourceHeaderTitle">Top Hits in All Categories</span><div className="aa-SourceHeaderLine" />
                                `;
                        },
                        item({ item }) {
                            // console.log(item);
                            return html`
                                <div class="h6" style="color: red;">
                                    <a href="/${item.area.slug}/${item.id}">${item.title} in ${item.area.name}</a>
                                </div>
                                <p class="text-muted">
                                    ${item.body}
                                </p>
                            `;
                        },
                    },
                }
            ];
        }
    };
}
