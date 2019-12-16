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
  </body>
</html>
