@extends('blog::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                <i class="fa fa-th-list"></i> @lang('blog::blog.new_post')

                <a href="{{ url('admin/posts') }}" class="btn btn-primary">
                    <i class="fa fa fa-arrow-left"></i> @lang('blog::blog.blog_posts')
                </a>
            </h1>

            {!! Form::open(['url' => url('admin/posts'), 'method' => 'post']) !!}
                @include('blog::admin.posts.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
