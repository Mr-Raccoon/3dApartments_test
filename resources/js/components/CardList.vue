<template>
    <div class="card-wrapper">
        <div v-if="!offers_loaded" class="preloader">
            <div class="preloader__image"></div>
        </div>

        <h1 v-else-if="cards.length === 0">No articles yet. Please create your first article!</h1>

        <div v-else class="row">
            <card v-for="card in paginatedCards" :title="card.name" :description="card.text" :imageSrc="card.image_src" :id="card.id"></card>
        </div>

        <nav aria-label="Page navigation" class="d-flex justify-content-between">
            <div class="d-flex flex-column">
                <span>Total cards: {{ cards.length }}</span>
                <span>Page {{ pageNumber + 1 }} of {{ pageCount }}</span>
            </div>
            <ul class="pagination justify-content-end">
                <li @click="prevPage" :class="{ disabled: prevBtnDisabled }" class="page-item">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li @click="nextPage" :class="{ disabled: nextBtnDisabled }" class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "CardList",
    data: function () {
        return {
            offers_loaded: false,
            cards: [],
            pageNumber: 0,
            cardsInPage: 2
        }
    },
    computed: {
        prevBtnDisabled() {
            return this.pageNumber === 0
        },
        nextBtnDisabled() {
            return this.pageNumber >= this.pageCount - 1
        },
        pageCount(){
            let l = this.cards.length,
                s = this.cardsInPage;

            return Math.ceil(l/s);
        },
        paginatedCards(){
            const start = this.pageNumber * this.cardsInPage,
                end = start + this.cardsInPage;
            return this.cards.slice(start, end);
        }
    },
    methods: {
        getArticles() {
            let vm = this;

            axios.get('/api/all').then(function (response) {
                vm.offers_loaded = true;
                vm.cards = response.data;
            }).catch(function (error) {
                console.log('Error:' + error);
            });
        },
        nextPage(){
            if (!this.nextBtnDisabled) this.pageNumber++;

        },
        prevPage(){
           if (!this.prevBtnDisabled) this.pageNumber--;
        }
    },
    mounted() {
        this.getArticles();

        this.$root.$on('article-created', data => {
            this.getArticles();
        });
    }
}
</script>

<style scoped>

</style>
