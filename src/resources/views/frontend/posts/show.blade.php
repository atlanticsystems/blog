@extends('blog::layouts.master')

@section('metas')
    <meta name="title" content="{{ $post->meta_title_translated }}" />
    <meta name="description" content="{{ $post->meta_description_translated }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:title" content="{{ $post->meta_title_translated }}" />
    <meta property="og:description" content="{{ $post->meta_description_translated }}" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:image" content="{{ url($post->image) }}"/>
@endsection

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

            {!! $post->description_translated !!}
        </div>

        <div class="col-md-3">
            @include('blog::frontend.latest_posts')
            @include('blog::frontend.categories')
        </div>
    </div>
@stop
