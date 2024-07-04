<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body >
        <h1>New post from {{$post->website->name}}</h1>
        <h2>{{$post->title}}</h1>
            <p>{{$post->description}}</p>
    </body>
</html>
