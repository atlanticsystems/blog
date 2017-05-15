<h1>
    <i class="fa fa-th-list"></i> @lang('blog::blog.edit_category')

    <a href="{{ url('admin/post_categories') }}" class="btn btn-primary">
        <i class="fa fa fa-arrow-left"></i> @lang('blog::blog.blog_categories')
    </a>
</h1>

{!! Form::model($post_category, ['url' => url("admin/post_categories/$post_category->id"), 'method' => 'patch']) !!}
    @include('blog::admin.post_categories.form')
{!! Form::close() !!}
