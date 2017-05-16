@extends('blog::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                <i class="fa fa-th-list"></i> @lang('blog::blog.edit_post')

                <a href="{{ url('admin/posts') }}" class="btn btn-primary">
                    <i class="fa fa fa-arrow-left"></i> @lang('blog::blog.blog_posts')
                </a>
            </h1>

            {!! Form::model($post, ['url' => url("admin/posts/$post->id"), 'method' => 'patch']) !!}
                @include('blog::admin.posts.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
