@extends('blog::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>
                <i class="fa fa-th-list"></i> @lang('blog::blog.new_category')

                <a href="{{ url('admin/post_categories') }}" class="btn btn-primary">
                    <i class="fa fa fa-arrow-left"></i> @lang('blog::blog.blog_categories')
                </a>
            </h1>

            {!! Form::open(['url' => url('admin/post_categories'), 'method' => 'post']) !!}
                @include('blog::admin.post_categories.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
