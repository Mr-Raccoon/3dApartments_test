<template>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <img class="card-img-top" :src=" 'storage/' + image" alt="Card image cap">
            <div class="card-body d-flex flex-column">
                <h4>{{ title }}</h4>
                <p class="card-text">{{ description}}</p>
                <div @click="deleteArticle" class="btn btn-danger">Delete</div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "card-item",
    props: ['id', 'title', 'imageSrc', 'description'],
    data: function () {
        return {
            image: this.imageSrc
        }
    },
    methods: {
        deleteArticle() {
            let vm = this;

            axios.get('/api/delete-articles',{
                params: {
                    id: this.id
                }
            })
                .then(function (response) {
                    swal({
                        title: response.data.name,
                        text: response.data.msg,
                        icon: response.data.status
                    });
                })
                .then(function () {
                    vm.$root.$emit('article-created');
                })
                .catch(function (error) {
                    swal({
                        title: error.name,
                        text: error.msg,
                        icon: error.status
                    });
                })
        },
        setDefaultImg() {
            this.image = 'img/default.png';
        }
    },
    mounted() {
        if (this.image === '') {
            this.setDefaultImg();
        }
    }
}
</script>

<style scoped>

</style>
