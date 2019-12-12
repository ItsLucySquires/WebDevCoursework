<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <p>@{{post.content}}</p>
    <div id="root">

    </div>
    <script>
      var app=new Vue({
        el: "#root",
        data: {
          post: '',
          comments: [],
        },
        mounted(){
          axios.get("{{ route ('api.posts.show') }}")
          .then(response =>{
            this.post=response.data;
          })
          .catch(response=>{
            console.log(response);
          })
        },
        methods: {
            addContent: function(){
              axios.post("{{ route ('api.posts.store') }}", {
                content: this.newPostContent
              })
              .then(response =>{
                this.posts.push(response.data);
                this.newPostContent = '';
              })
              .catch(response =>{
                console.log(response);
              })
            }
          }
        });
      });
    </script>
  </body>
</html>
