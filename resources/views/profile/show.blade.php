<!DOCTYPE html>
<html>
  <head>
    <title>User profile</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <h2>{{$profile->user->name}}</h2>
    <p>Tell us something about yourself:</p>
    <p>{{$profile->description}}</p>
    <div id="root">
      <h4>Update profile description:</h4>
      <input type="text" id="input" v-model="newDesc">
      <button @click="addContent">Add post</button>
    </div>
    <script>
      var app=new Vue({
        el: "#root",
        data: {
          newDesc: '',
        },
        methods: {
            addContent: function(){
              axios.patch("{{ route ('api.profiles.update', ['id'=>$profile->user_id]) }}", {
                description: this.newDesc
              })
              .then(response =>{
                this.newDesc = '';
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
