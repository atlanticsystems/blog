@extends('blog::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $page_title or trans('blog::blog.blog') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            <a href="{{ url($post->route) }}">{{ $post->title_translated }}</a>
                        </h2>

                        @include('blog::frontend.posts.post_data')

                        <p>{{ $post->short_description_translated }}</p>

                        <hr>

                        <div class="text-right">
                            <a href="{{ url($post->route) }}" class="btn btn-lg btn-primary">@lang('blog::blog.read_more')</a>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($posts->total())
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>
            @endif
        </div>

        <div class="col-md-3">
            @include('blog::frontend.latest_posts')
            @include('blog::frontend.categories')
        </div>
    </div>
@stop
