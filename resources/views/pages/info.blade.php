@extends('layouts.master')

@section('title', 'Info')

@section('headerScripts')
    @parent
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('content')

    @include('components.navbar_login')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h3>Users:</h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">email(login)</th>
                        <th scope="col">password</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->email }}</td>
                            <td>password</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection


