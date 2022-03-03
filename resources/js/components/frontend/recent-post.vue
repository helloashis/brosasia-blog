<template>
	<div>
		<div class="card-header">
			<h5>Recent Post</h5>
		</div>
		<div class="card-body">
			<ul class="list-group">
		        <li class="list-group-item" v-for="post in posts" v-bind:key="post.id">
		        	<div class="card mb-2">
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-md-4">
	                                <img class="img-thumbnail" :src="fileLink(post.thumbnail)" alt="">
	                            </div>
	                            <div class="col-md-8">
	                                <p><router-link :to="`/post/details/${post.slug}`">{{ post.title }}</router-link></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
		        </li>

		    </ul>
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
        	fileLink: function (name) {
                if (name !== null && name.length < 256)
                    return '../../' + name;
                else
                    return this.form.thumbnail;
            },
            
            loadposts(){
                axios.get('/posts').then((response)=>{
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