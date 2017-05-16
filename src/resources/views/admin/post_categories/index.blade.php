@extends('blog::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>
                <i class="fa fa-th-list"></i> @lang('blog::blog.blog_categories')

                <a class="btn btn-primary" href="{{ url('admin/post_categories/create') }}">
                    <i class="fa fa-plus"></i> @lang('blog::blog.new_category')
                </a>
            </h1>
        </div>

        <div class="col-md-4">
            {!! Form::open(['url' => url('admin/post_categories'), 'method' => 'get', 'class' => 'navbar-form pull-right']) !!}
                <div class="input-group">
                    {!! Form::text('q', request()->get('q'), ['class' => 'form-control input-lg', 'placeholder' => trans('blog::blog.search')]) !!}

                    <div class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>@lang('blog::blog.title')</th>
                        <th>@lang('blog::blog.alias')</th>
                        <th style="width:55px;"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <a href="{{ url("admin/post_categories/$category->id/edit") }}">{{ $category->title_translated }}</a>
                            </td>
                            <td>{{ $category->alias_translated }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li>
                                            <a href="{{ url("admin/post_categories/$category->id/edit") }}">
                                                <i class="fa fa-fw fa-edit"></i> @lang('blog::blog.edit')
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ url("admin/post_categories/$category->id") }}" class="send-form" data-method="delete" data-confirm="@lang('blog::blog.sure_to_delete_category')">
                                                <i class="fa fa-fw fa-trash"></i> @lang('blog::blog.delete')
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
