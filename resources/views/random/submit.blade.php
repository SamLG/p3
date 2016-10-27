@extends('layouts.master')


@section('title')
    P3 Random User Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
@stop


@section('content')
    <h2>Random User Generator.</h2>
    <form method='POST' action='/random-user'>
        {{ csrf_field() }}
        <label for="user_count"># of Users (Max 99)</label>
        <input id="user_count" type='number' name='user_count' value="{{$user_count}}" min="1" max="99">
        <br>
        <label for='dob'>Include Date of Birth</label>
        <input id="dob" type='checkbox' name='dob' {{$dob}}>
        <br>
        <label for='profile'>Include Profile</label>
        <input id="profile" type='checkbox' name='profile' {{$profile}}>
        <br>
        <input type='submit' value='Submit'>
    </form>
    <br>
    <?php
    foreach($usersArray as $user) {
        echo '<h3>'.$user['name'].'</h3>';
        if ($dob) {
            echo '<p>Date of Birth: '.$user['dob'].'</p>';
        }
        if ($profile) {
            echo '<p>Profile: '.$user['profile'].'</p>';
        }
    }
    ?>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
@stop
