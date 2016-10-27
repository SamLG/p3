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
    @if($errors->get('user_count'))
        <ul>
            @foreach($errors->get('user_count') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/random-user'>
        {{ csrf_field() }}
        <label for="user_count"># of Users (Max 99)</label>
        <input id="user_count" type='number' name='user_count' value="{{$user_count}}" min="1" max="99" required>
        <!-- version to show server side validation
        <input id="user_count" type='number' value="{{$user_count}}"> -->
        <p>Include:</p>
        <label for='dob'>Date of Birth</label>
        <input id="dob" type='checkbox' name='dob' {{$dob}}>
        <br>
        <label for='phone'>Phone #</label>
        <input id="phone" type='checkbox' name='phone' {{$phone}}>
        <br>
        <label for='email'>Email</label>
        <input id="email" type='checkbox' name='email' {{$email}}>
        <br>
        <label for='location'>Location</label>
        <input id="location" type='checkbox' name='location'{{$location}}>
        <br>
        <label for='profile'>Profile</label>
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
        if ($phone) {
            echo '<p>Phone #: '.$user['phone'].'</p>';
        }
        if ($email) {
            echo '<p>Email: '.$user['email'].'</p>';
        }
        if ($location) {
            echo '<p>City: '.$user['location'].'</p>';
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
