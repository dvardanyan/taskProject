<template>
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-3 sidebar  bg-dark text-white" style="height:100%">
                <ul class="nav nav-sidebar"> 
                    <li><router-link to="/search">Search product by name</router-link></li>
                    <li><router-link to="/post">Post a product</router-link></li>
                </ul>
            </div>
        <div class="col-md-9 main">
            <router-view></router-view>
        </div>
        </div>
    </div>
  

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

</style>