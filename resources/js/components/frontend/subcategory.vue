<template>
    <div>
    	<div class="card-header">
    		<h5>Sub Category</h5>
    	</div>
    	<div class="card-body">
			<ul class="list-group">

		        
		        <li v-for="subcategory in subcategories" v-bind:key="subcategory.id" class="list-group-item d-flex justify-content-between align-items-start">
				    <div class="ms-2 me-auto">
				      <div class="fw-bold"><router-link class="text-decoration-none" :to="`/subcategory-wise/${subcategory.slug}`">{{ subcategory.title }}</router-link> </div>
				      <small>__{{ subcategory.category.title }}</small>
				    </div>
				    <!-- <span class="badge bg-primary rounded-pill">2</span> -->
				  </li>

		    </ul>
		</div>
	</div>
</template>


<script>
	export default{

        data(){
            return{
                subcategories:{},
            }
        },
        methods:{
            loadsubcategories() {
                axios.get('/sub-category')
                    .then(response => {
                        this.subcategories = response.data;
                    });
            },
            subStringWithHtml: function(content, length, s){
                return content.substring(0, length) + s;
            },

        },
        mounted(){
            this.loadsubcategories();

        }
    }
</script>
