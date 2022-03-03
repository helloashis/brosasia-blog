<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-2" v-for="post in posts" v-bind:key="post.id">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-thumbnail" v-bind:src="post.thumbnail" alt="">
                            </div>
                            <div class="col-md-8">
                                <h4><router-link class="text-decoration-none" :to="`/post/details/${post.slug}`">{{ post.title }}</router-link></h4>

                                <p v-html="subStringWithHtml(post.content, 150,'...')"></p>
                                <span>
                                    <router-link :to="`/post/details/${post.slug}`" class="btn btn-outline-info btn-sm">Readmore</router-link>
                                    <small class="badge bg-primary">{{ post.category.title }}</small>
                            <small class="badge bg-info">{{ post.subcategory.title }}</small>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
               
                
            </div>
            <div class="col-md-4">
                <div class="card mb-2">
                    <sub-category></sub-category>
                </div>

                <div class="card ">
                    <recent-post></recent-post>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                posts:{},
            }
        },
        methods:{
            loadposts() {
                axios.get('/get-active-posts')
                    .then(response => {
                        this.posts = response.data;
                    });
            },
            subStringWithHtml: function(content, length, s){
                return content.substring(0, length) + s;
            },

        },
        mounted(){
            this.loadposts();

        }
    }
</script>