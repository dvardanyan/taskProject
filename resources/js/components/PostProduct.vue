<template>
  <div>
    <div v-if="success !=''" class="alert alert-success" role="alert">
      <p>Yeah you did it,{{success}}</p>
    </div>
    <form @submit="postProd" enctype="multipart/form-data">
      <div class="form-group col-md-6">
        <label for="name">Name of Product</label>
        <input type="text" class="form-control" id="name" placeholder="Product name" name="name" v-model="name">
      </div>
    <div class="form-group col-md-6">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Description for product" name="description" v-model="description">
    </div>
    <div class="form-group">
        <label for="image">Image of product</label>
        <input type="file" class="form-control-file" id="image" name="image" v-on:change="onFileChange">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
    export default {
        data() {
            return {
              name:'',
              description: '',
              image:'',
              file:'',
              success:''
            }
        }, 
        methods:{
            postProd(e){
                e.preventDefault();
                let self=this;
                let form=new FormData();
                form.append('file',this.file);
                form.append('name',this.name);
                form.append('description',this.description);
                let config={header:{'content-type':'multipart/form-data'}};
                axios.post("http://localhost:8000/home/post-product",form,config).then(response=>{
                    self.success=response.data.success;
                    self.file="";
                }).catch(err=>console.log(err));
            },
            onFileChange(e){
                this.file=e.target.files[0];
                this.image=e.target.files[0].name;
            },
        }
    }
</script>