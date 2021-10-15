<template>
  <div>
    <p>You can search both by id and by name(if you know it)</p>
    <form  @submit="searchProd">
      <div class="row">
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Search by name" v-model="searchParam" name="name">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <div class="card">
            <img class="card-img" :src="'/images/'+product.image" alt="Product">
            <div class="card-body">
              <h4 class="card-title">{{product.name}}</h4>
              <p class="card-text">{{product.description}}</p>
            </div >
          </div>
        </div>
      </div>
    </div>
  </div>          
</template>

<script>
    export default {
        data() {
              return {
              product: {
                  name:'test product default',
                  description:'test description default',
                  image:'headphone.jpg'
                },
              searchParam:''
              }
        }, 
        methods:{
            searchProd(e){
                e.preventDefault();
                let data=this.searchParam;
                axios.get('http://localhost:8000/home/search/search-product',{params:{data}}).then(res=>{this.product=res.data.d}).catch(err=>console.log(err));
            }
        }
    }
</script>

<style scoped>
  body {
  padding: 2rem 0rem;
}
</style>

