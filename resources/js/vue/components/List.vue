<template>
  <div>

    <o-modal v-model:active="confirmDeleteActive">
      <div class="p-4">
        <p>Are you sure you want to delete the selected register?</p>
      </div>

      <div class="flex flex-row-reverse gap-2 p-3">
        <o-button variant="danger" @click="deletePost()">Delete</o-button>
        <o-button @click="confirmDeleteActive=false">Cancel</o-button>
        </div>
    </o-modal>

    <h1>POSTS LIST</h1>

    <o-button iconLeft="plus" @click="$router.push({ name: 'save' })">Create</o-button>

    <div class="mb-5"></div>

    <o-table :loading="isLoading" :data="posts.current_page && posts.data.length == 0 ? [] : posts.data">
      <o-table-column field="id" label="ID" numeric v-slot="post">
        {{ post.row.id }}
      </o-table-column>
      <o-table-column field="title" label="Title" v-slot="post">
        {{ post.row.title }}
      </o-table-column>
      <o-table-column field="posted" label="Posted" v-slot="post">
        {{ post.row.posted }}
      </o-table-column>
      <o-table-column field="created_at" label="Date" v-slot="post">
        {{ post.row.created_at }}
      </o-table-column>
      <o-table-column field="category" label="Category" v-slot="post">
        {{ post.row.category.title }}
      </o-table-column>
      <o-table-column field="slug" label="Actions" v-slot="post">
        <router-link class="mr-5" :to="{name:'save', params:{'slug':post.row.slug}}">Edit</router-link>
        <!-- WHEN DELETE BUTTON IS CREATED, THE ROW VALUE IS ASSIGNED IN ORDER TO SAVE WICH POST WE ARE GOING TO DELETE -->
        <o-button iconLeft="delete" rounded size="small" variant="danger" @click="deletePostRow=post;confirmDeleteActive=true">Delete</o-button>
      </o-table-column>
    </o-table>

    <br>

    <o-pagination
    @change="updatePage"
      v-if="posts.current_page && posts.data.length > 0"
      :total="posts.total"
      v-model:current="currentPage"
      :range-before="2"
      :range-after="2"

      size="small"
      :simple="false"
      :rounded="true"
      :per-page="posts.per_page"
    >
    </o-pagination>
  </div>

</template>

<script>
export default {

    data() {
      return {
        posts: [],
        isLoading: true,
        currentPage: 1,
        confirmDeleteActive:false,
        deletePostRow: ""
      }
    },

    methods : {

      updatePage() {
        setTimeout(this.listPage, 100)
      },

      listPage() {
        this.isLoading = true;
        this.$axios.get("/api/post?page=" + this.currentPage).then((res) => {
          this.posts = res.data;
          this.isLoading = false;
      });
      },

      deletePost() {
        this.confirmDeleteActive=false
        this.posts.data.splice(this.deletePostRow.index,1)
        this.$axios.delete("/api/post/"+this.deletePostRow.row.id)
        // DELETED ALERT
        this.$oruga.notification.open({
          message: 'Register deleted',
          position: "bottom-right",
          variant: 'danger',
          duration: 4000,
          closable: true,
        })
    },
  },

    

    async mounted() {
        this.listPage()

    },
};
</script>

<style>

</style>