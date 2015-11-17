@extends('layouts.master')

@section('content')
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12 m8 push-m2 l6 push-l3">
                <div class="card left-align">
                    <div class="card-content">
                        <div class="card-title">{{ $user->name }}</div>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn white-text" href="{{ action('User\ProfileController@getEditProfile') }}"><i class="material-icons left">input</i>Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
