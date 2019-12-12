<!DOCTYPE html>
<html>
  <head>
    <title>User profile</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <h2>{{$profile->user->name}}</h2>
    <div>
      <p>Tell us something about yourself:</p>
      <p>{{$profile->description}}</p>
    </div
    <div id="root">
      <h3>Update status</h3>
      <input type="text" id="input" v-model="newProfileDesc">
      <button @click="changeDesc">Update</button>
      <h3>Friends list: </h3>
    </div>
    <script>
      var app=new Vue({
        el: "#root",
        data: {
          friends: [],
          newPostContent: '',
        },
        methods: {
            changeDesc: function(){

              axios.post("{{ route ('api.profiles.update', ['id'=>$profile->id]) }}", {
                content: this.newProfileDesc
              })
              .then(response =>{
                this.newProfileDesc = '';
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
