<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                    <li class="breadcrumb-item active" aria-current="page">Sub-Category Wise</li>
                  </ol>
                </nav>
            </div>
            
            <div class="col-md-4 col-lg-4" v-for="post in posts" v-bind:key="post.id">
                <div class="card mb-3">
                  <img v-bind:src="post.thumbnail" class="card-img-top" :alt="post.slug">
                  <div class="card-body">
                    <h5 class="card-title"><router-link class="text-decoration-none" :to="`/post/details/${post.slug}`">{{ post.title }}</router-link></h5>

                    <p class="card-text">
                        <span v-html="subStringWithHtml(post.content, 150,'...')"></span>
                        <router-link class="btn btn-success btn-sm float-right" :to="`/post/details/${post.slug}`">Read More</router-link>
                    </p>
                        

                    <p class="card-text row">
                        <span class="col-6">
                            <small class="badge bg-primary">{{ post.category.title }}</small>
                            <small class="badge bg-info">{{ post.subcategory.title }}</small>
                        </span>
                        <span class="col-6">
                            <small class="text-bold text-right">Posted by {{ post.user.name }}</small>
                        </span>
                    </p>
                  </div>
                </div>
            </div>
            
        </div>
    </div>
</template>
<script>
	export default{
        name: "subcategory-wise",

        data(){
            return{
                posts:{}
            }
        },
       watch:{
            $route(){
                this.loadposts();
            }
        },
        methods:{
        	fileLink: function (name) {
                if (name !== null && name.length < 256)
                    return '../../' + name;
                else
                    return this.form.thumbnail;
            },
            
            loadposts(){
                 axios.get("/subcategory-wise/" + this.$route.params.slug).then((response) =>{
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
