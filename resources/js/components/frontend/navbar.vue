<template>
	<div >
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link to="/" class="navbar-brand">
                    <img width="25%" src="assets/frontend/image/logo.png" alt="Brosasia Logo">-Blog
                </router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <router-link class="nav-link " to="/">Home page</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/about">About</router-link>
                        </li>
                        
                        <li class="nav-item">
                            <router-link class="nav-link" to="/allposts">All Posts</router-link>
                        </li>

                        <li class="nav-item">
                            <router-link class="nav-link" to="/contact-us">Contact Us</router-link>
                        </li>

                    </ul>

                    
                </div>
            </div>
        </nav>
	</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>