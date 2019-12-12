<!DOCTYPE html>
<html>
  <head>
    <title>Posts</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"> </script>
    <p>{{$post->content}}</p>
    <ul>
      @foreach ($post->comments as $comment)
      <li>
        {{$comment->content}}
      </li>
      @endforeach
    </ul>

  </body>
</html>
