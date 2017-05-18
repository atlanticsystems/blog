@extends('blog::layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $post->title_translated }}</h1>
            <h2>{{ $post->subtitle_translated }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            @include('blog::frontend.posts.post_data')

            <p>{{ $post->description_translated }}</p>
        </div>

        <div class="col-md-3">
            @include('blog::frontend.latest_posts')
            @include('blog::frontend.categories')
        </div>
    </div>
@stop
