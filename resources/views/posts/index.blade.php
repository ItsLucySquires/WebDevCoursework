<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <p>Posts</p>
    <div id="root">
      <ul>
        <li v-for="post in posts">@{{ post.content }}</li>
      </ul>
      
    </div>
    <script>
      var app=new Vue({
        el: "#root",
        data: {
          posts: [],
        },
        mounted(){
          axios.get("{{ route ('api.posts.index') }}")
          .then(response =>{
            this.posts=response.data;
          })
          .catch(response=>{
            console.log(response);
          })
        },
      });
    </script>
  </body>
</html>
