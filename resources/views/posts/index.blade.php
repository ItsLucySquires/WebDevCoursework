<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <h2>Posts</h2>
    <ul>
        @foreach ($posts as $post)
          <li>
              <a href="{{ route('api.profiles.show', ['id'=>$post->user_id])}}">
                {{$post->user->name}}
              </a>
              says:<br/>
              &nbsp;&nbsp;&nbsp;
              <a href="{{ route('api.posts.show', ['id'=>$post->id])}}">
                {{$post->content}}
              </a>
              <br/>
              <a href="{{route('posts.destroy', ['id'=>$post->id])}}">
                Delete
              </a>
              &nbsp;&nbsp;
              <a href="{{route('posts.edit', $post->id)}}">
                Edit
              </a>
              <br/>
              Tags:
              @foreach ($post->tags as $tag)
                [{{$tag->name}}]
              @endforeach
              <br/><br/>
          </li>
        @endforeach
    </ul>
    <div id="root">
      <h3>Create a post</h3>
      <input type="text" id="input" v-model="newPostContent">
      <br/>
      <button @click="addContent">Add post</button>
    </div>
    <script>
      var app=new Vue({
        el: "#root",
        data: {
          newPostContent: '',
        },
        methods: {
            addContent: function(){
              axios.post("{{ route ('posts.store') }}", {
                content: this.newPostContent
              })
              .then(response =>{
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
