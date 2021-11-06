import algoliasearch from "algoliasearch";
import { getAlgoliaResults } from "@algolia/autocomplete-js";

export const matches1ItemsPlugin = {
    getSources() {
        return [
            {
                sourceId: 'matches1ItemsPlugin',
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
                                    <span className="aa-SourceHeaderTitle">Listing Matches</span>
                                    <div className="aa-SourceHeaderLine" />
                            `;
                    },
                    item({ item }) {
                        // console.log(item);
                        return html`
                                <div class="h6" style="color: red;">
                                    ${item.title} in ${item.area.name}
                                </div>
                                <p class="text-muted">
                                    ${item.body}
                                </p>
                            `;
                    },
                },
                // getItems({ query }) {
                //     if (!query) {
                //         return predefinedItems;
                //     }
                //     return predefinedItems.filter((item) =>
                //         item.label.toLowerCase().includes(query.toLowerCase())
                //     );
                // },
                // getItemUrl({ item }) {
                //     return item.url;
                // },
                // templates: {
                //     header({ items }) {
                //         if (items.length === 0) {
                //             return null;
                //         }
                //         return (
                //             <>
                //                 <span className="aa-SourceHeaderTitle">Links</span>
                //                 <div className="aa-SourceHeaderLine" />
                //             </>
                //         );
                //     },
                //     item({ item }) {
                //         return (
                //             <a className="aa-ItemLink" href={item.url}>
                //                 <div className="aa-ItemIcon aa-ItemIcon--noBorder">
                //                     <svg
                //                         width="18"
                //                         height="18"
                //                         viewBox="0 0 24 24"
                //                         fill="none"
                //                         stroke="currentColor"
                //                         strokeWidth="2"
                //                         strokeLinecap="round"
                //                         strokeLinejoin="round"
                //                     >
                //                         <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                //                         <polyline points="15 3 21 3 21 9" />
                //                         <line x1="10" y1="14" x2="21" y2="3" />
                //                     </svg>
                //                 </div>

                //                 <div className="aa-ItemContent">
                //                     <div className="aa-ItemContentTitle">{item.label}</div>
                //                 </div>
                //             </a>
                //         );
                //     },
                // },
            },
        ];
    },
};
