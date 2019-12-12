<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <p>Posts</p>

      <ul>
        @foreach ($posts as $post)
          <li>
              {{$post->user->name}} says:
              <a href="{{ route('api.posts.show', ['id'=>$post->id])}}">
                {{$post->content}}
              </a>
          </li>
        @endforeach
    </ul>
    <div id="root">
      <h3>Create a post</h3>
      <input type="text" id="input" v-model="newPostContent">
      <button @click="addContent">Add post</button>
    </div>
    <script>
      var app=new Vue({
        el: "#root",
        data: {
          posts: [],
          newPostContent: '',
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
    </script>
  </body>
</html>
