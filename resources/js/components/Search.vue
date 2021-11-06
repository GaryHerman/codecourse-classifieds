<template>
    <form action="">
        <div class="form-group" id="listing-search"></div>
    </form>
</template>

<script>
    import { listingsautocomplete } from '../helpers/autocomplete/autocomplete.js';

    export default {
        props: [
            'categoryId',
            'areaIds'
        ],
        mounted() {
            listingsautocomplete('#listing-search', {
                categoryId: this.categoryId,
                areaIds:    this.areaIds,
            });

            // Debug Code
            // console.log(this.categoryId, this.areaIds);
        }
    };
</script>
