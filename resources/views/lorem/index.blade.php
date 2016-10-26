@extends('layouts.master')


@section('title')
    P3 Lorem-Ipsum Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    <h2>Lorem-Ipsum Generator.</h2>
    <form method='POST' action='/lorem-ipsum'>
        {{ csrf_field() }}
        <label for="paragraph_count"># of Paragraphs (Max 99)</label>
        <input id="paragraph_count" type='number' name='paragraph_count' value="1" min="1" max="99">
        <br>
        <input type='submit' value='Submit'>
    </form>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
