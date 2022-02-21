@extends('layouts.master')

@section('title', 'Post')

@section('headerScripts')
    @parent
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('content')

    @include('components.navbar_login')

    <hr>

    <div class="row mb-3">
        <div class="col">
            @include('components.slider', [
            'phrases' => $phrases,
            ])
        </div>
    </div>

    <input id="page_offset" type="hidden" value="0">
    <input
        type="hidden"
        name="post_id"
        id="post_id"
        value="{{ $post->id }}"/>

    <div class="mb-3">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <p>
                                {{ $post->body }}
                            </p>

                            @auth

                                <div class="mb-3">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">

                                                <h4>Добавить комментарий</h4>

                                                <div class="form-group">
                        <textarea
                            id="text_add_comment"
                            class="form-control"
                            name="body">
                        </textarea>

                                                </div>
                                                <div class="form-group">
                                                    <input
                                                        id="btn_add_comment"
                                                        type="button"
                                                        class="btn btn-primary"
                                                        value="Добавить комментарий"/>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endauth

                            <hr/>
                            <h4>Комментарии:</h4>
                            <hr/>

                            <label
                                for="search"
                                class="form-label">
                                Поиск комментариев по автору:
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="search"
                            >

                            <hr>

                            <div id="comments_list">
                                @include('components.comments', [
                                'comments' => $post->comments,
                                'post_id' => $post->id
                                ])
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <button
            id="show_more"
            type="button"
            class="btn btn-primary">
            Показать еще
        </button>

    </div>

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/post.js') }}"></script>
@endsection
