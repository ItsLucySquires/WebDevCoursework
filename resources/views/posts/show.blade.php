<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>

    <p>{{$post->user->name}}: {{$post->content}}</p>
    <ul>
      @foreach ($post->comments as $comment)
      <li>
        {{$comment->user->name}}:
        <br/>
        &nbsp;&nbsp;&nbsp;
        {{$comment->content}}
      </li>
      @endforeach
    </ul>
    <div id="root">
      <h3>Add comment</h3>
      <input type="text" id="input" v-model="newCommentContent">
      <button @click="addContent">Add post</button>
    </div>

    <script>
      var app=new Vue({
        el: "#root",
        data: {
          comments: [],
          newCommentContent: '',
        },
        methods: {
            addContent: function(){
              axios.post("{{ route ('comments.store', ['id'=>$post->id]) }}", {
                content: this.newCommentContent
              })
              .then(response =>{
                this.comments.push(response.data);
                this.newCommentContent = '';
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
