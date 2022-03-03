<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                    <li class="breadcrumb-item" aria-current="page">Post Details</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ post.title }}</li>
                  </ol>
                </nav>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                  <img :src="fileLink(post.thumbnail)" class="card-img-top" :alt="post.slug">
                  <div class="card-body">
                    <h4 class="card-title">{{ post.title }} <sub class="text-muted">posted by: <b>{{ post.user.name }}</b></sub></h4>
                    <p class="card-text">
                        <span v-html="post.content"></span>
                    </p>
                    <p class="card-text row">
                        <span class="col-8">
                            <small class="badge bg-primary">{{ post.category.title }}</small>
                            <small class="badge bg-info">{{ post.subcategory.title }}</small>
                        </span>
                        <span class="col-4">
                            <small class="text-bold text-right">Date: 2022-02-3</small>
                        </span>
                    </p>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <recent-post></recent-post>
            </div>
        </div>
    </div>
</template>


<script>
	export default{
        name: "single-post",
        data: function() {

            return{
                post:{}
            }

        },
       
        methods:{
            fileLink: function (name) {
                if (name !== null && name.length < 256)
                    return '../../' + name;
                else
                    return this.form.thumbnail;
            },
            
            emptyData() {
                return (this.post.length < 1);
            },
            
            loadposts: function () {
                
                axios.get("/post/details/" + this.$route.params.slug).then((response) => {
                    this.post = response.data;
                }).catch((error) => {

                })
            },
            
        },
        mounted() {
            this.loadposts();
            
        },
	}
</script>
