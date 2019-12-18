<!DOCTYPE html>
<html>
  <head>
    <title>Comment</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <h2>Comment</h2>
    <p>Old text: {{$comment->content}}</p>
    <br/>
    <p>New text: </ps>
    <br/>
    <div id="root">
      <input type="text" id="input" v-model="newPostContent">
      <br/>
      <button @click="addContent">Change comment</button>
      <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <script>
      var app=new Vue({
        el: "#root",
        data: {
          newPostContent: '',
        },
        methods: {
            addContent: function(){
              axios.post("{{ route ('comments.myedit', ['id'=>$comment->id]) }}", {
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
