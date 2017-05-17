@extends('blog::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>@lang('blog::blog.blog')</h1>
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

                        <p>
                            <small>
                                @lang('blog::blog.published'): <b>{{ $post->created_at->format('d-m-Y') }}</b>
                                &nbsp;|&nbsp;
                                @lang('blog::blog.category'): <b><a href="{{ url($post->postCategory->route) }}">{{ $post->postCategory->title_translated }}</a></b>
                            </small>
                        </p>

                        <hr>

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
            @if ($latest_posts)
                <h3>@lang('blog::blog.latest_posts')</h3>

                <hr>

                @foreach ($latest_posts as $post)
                    <div class="row">
                        <div class="col-md-12">
                            <h4><a href="{{ url($post->route) }}">{{ $post->title_translated }}</a></h4>
                            <p><small>{{ $post->created_at->format('d-m-Y') }}</small></p>
                        </div>
                    </div>
                @endforeach
            @endif

            @if ($categories)
                <h3>@lang('blog::blog.blog_categories')</h3>

                <hr>

                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ url($category->route) }}">{{ $category->title_translated }} <span class="label label-primary">{{ $category->posts_count }}</span></a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop
