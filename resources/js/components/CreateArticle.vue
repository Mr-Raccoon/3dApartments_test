<template>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" @submit.prevent="createArticle">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Article name</label>
                        <input type="text" required class="form-control" v-model="article.name" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Yor article</label>
                        <textarea class="form-control" required v-model="article.text" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" @change="selectFile" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "CreateArticle",
    data: function () {
        return {
            article: {
                name: '',
                text: '',
                image_src: ''
            }
        }
    },
    methods: {
        selectFile(event) {
            this.article.image_src = event.target.files[0];
        },
        createArticle() {
            let vm = this;
            let data = new FormData();
            data.append('image_src', this.article.image_src);
            data.append('text', this.article.text);
            data.append('name', this.article.name);

            axios.post('/api/create-articles', data)
                .then(function () {
                    vm.article.text = '';
                    vm.article.name = '';
                    vm.article.image_src = '';
                    $('#exampleModalLong').modal('hide');
                }).then(function () {
                    swal({
                        title: 'Success!',
                        text: 'Your article created',
                        icon: 'success'
                    });
                }).then(function () {
                    vm.$root.$emit('article-created');
                }).catch(function (error) {
                    swal({
                        title: 'Error :(',
                        text: error,
                        icon: 'error'
                    });
                });
        }
    }
}
</script>

<style scoped>

</style>
