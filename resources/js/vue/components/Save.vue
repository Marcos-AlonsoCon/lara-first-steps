<template>
  
    <form @submit.prevent="submit">
        <h1 v-if="post">UPDATE <span class="font-bold">{{ post.title }}</span></h1>
        <h1 v-else>CREATE POST</h1>

        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <o-field label="Title" :variant="errors.title ? 'danger' : 'primary'" :message="errors.title">
                    <o-input v-model="form.title" value=""></o-input>
                </o-field>
            </div>

            
            <o-field :variant="errors.description ? 'danger' : 'primary'" :message="errors.description" label="Description">
                <o-input v-model="form.description" type="textarea" value=""></o-input>
            </o-field>
            <o-field :variant="errors.content ? 'danger' : 'primary'" :message="errors.content" label="Content">
                <o-input v-model="form.content" type="textarea" value=""></o-input>
            </o-field>
            <o-field :variant="errors.category_id ? 'danger' : 'primary'" :message="errors.category_id" label="Category">
                <o-select v-model="form.category_id" placeholder="Select a category">
                    <option v-for="c in categories" v-bind:key="c.id" :value="c.id">{{ c.title }}</option>
                </o-select>
            </o-field>
            <o-field :variant="errors.posted ? 'danger' : 'primary'" :message="errors.posted" label="Posted">
                <o-select v-model="form.posted" placeholder="Select a state">
                    <!-- <option value=""></option> -->
                    <option value="yes">Yes</option>
                    <option value="not">No</option>
                </o-select>
            </o-field>
        </div>
        <o-button variant="primary" native-type="submit">Send</o-button>
    </form>

</template>

<script>
export default {

    data() {
        return {
            categories: [],
            form:{
                title:"",
                description:"",
                content:"",
                category_id:"",
                posted:"",
            },
            errors:{
                title:"",
                description:"",
                content:"",
                category_id:"",
                posted:"",
            },
            post: "" 
        }
    },
    methods: {
         getCategory(){
            this.$axios.get("/api/category/all").then(res => {
                this.categories = res.data
            })
         },

         async getPost(){
            this.post = await this.$axios.get("/api/post/slug/" + this.$route.params.slug)
            this.post = this.post.data
         },

         initPost(){
            this.form.title = this.post.title
            this.form.description = this.post.description
            this.form.content = this.post.content
            this.form.category_id = this.post.category_id
            this.form.posted = this.post.posted

         },

         submit (){
            
            this.cleanErrorsForm()

            if(this.post == "")
                // CREATE
                return this.$axios.post("/api/post",
                this.form
                ).then(res => {
                    this.$oruga.notification.open({
                        message: 'Success register',
                        position: "bottom-right",
                        duration: 4000,
                        closable: true,
                    })
                }).catch(error => {
                    console.log(error.response.data)

                    if(error.response.data.title)
                        this.errors.title = error.response.data.title[0]
                    
                    if(error.response.data.description)
                        this.errors.description = error.response.data.description[0]

                    if(error.response.data.content)
                        this.errors.content = error.response.data.content[0]
                    
                    if(error.response.data.category_id)
                        this.errors.category_id = error.response.data.category_id[0]
                    
                    if(error.response.data.posted)
                        this.errors.posted = error.response.data.posted[0]
                    });
                
                // UPDATE
                this.$axios.patch("/api/post/"+this.post.id,
                this.form
                ).then(res => {

                    this.$oruga.notification.open({
                        message: 'Correctly updated',
                        position: "bottom-right",
                        duration: 4000,
                        closable: true,
                    })

                }).catch(error => {
                    console.log(error.response.data)

                    if(error.response.data.title)
                        this.errors.title = error.response.data.title[0]
                    
                    if(error.response.data.description)
                        this.errors.description = error.response.data.description[0]

                    if(error.response.data.content)
                        this.errors.content = error.response.data.content[0]
                    
                    if(error.response.data.category_id)
                        this.errors.category_id = error.response.data.category_id[0]
                    
                    if(error.response.data.posted)
                        this.errors.posted = error.response.data.posted[0]
                    
                })
            

            
         },

        cleanErrorsForm(){
            this.errors.title = ""
            this.errors.description = ""
            this.errors.content = ""
            this.errors.category_id = ""
            this.errors.posted = ""
        }
    },

    async mounted(){

        // IF THERE IS A slug (POST TO UPDATE)...
        if(this.$route.params.slug){
            await this.getPost()
            this.initPost()
        }

        

        this.getCategory()
    }
}
</script>

<style>

</style>