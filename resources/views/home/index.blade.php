@extends('layouts.master')


@section('title')
    P3 Homepage
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    <h2>Use these easy tools, to quickly create dummy data for your site.</h2>

    <h3>Lorem-Ipsum Generator</h2>
    <a href="/lorem-ipsum">Create lorem-ipsum text.</a>

    <h3>Random User Generator</h2>
    <a href="/random-user">Create random users.</a>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
