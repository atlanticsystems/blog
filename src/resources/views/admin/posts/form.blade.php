<h2>
    @lang('blog::blog.post_data')

    <div class="btn-group pull-right form-group" role="group">
        {!! Form::button('<i class="fa fa-floppy-o"></i> ' . trans('blog::blog.save'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}

        <a href="{{ url('admin/posts') }}" class="btn btn-danger">
            <i class="fa fa-times"></i> @lang('blog::blog.close')
        </a>
    </div>
</h2>

<hr>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('published', trans('blog::blog.published')) !!}
            {!! Form::select('published', [1 => 'Publicado', 0 => 'Borrador'], null, ['class' => 'form-control input-lg', 'required']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('post_category_id', trans('blog::blog.category')) !!}
            {!! Form::select('post_category_id', $categories, null, ['class' => 'form-control input-lg', 'required']) !!}
        </div>
    </div>
</div>

@foreach (config('blog.languages') as $key => $language)
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("title[$key]", trans('blog::blog.title') . " ($language)") !!}
                {!! Form::text("title[$key]", null, ['class' => 'form-control input-lg', 'required']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("subtitle[$key]", trans('blog::blog.subtitle') . " ($language)") !!}
                {!! Form::text("subtitle[$key]", null, ['class' => 'form-control input-lg', 'required']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("alias[$key]", trans('blog::blog.alias') . " ($language)") !!}
                {!! Form::text("alias[$key]", null, ['class' => 'form-control input-lg', 'required']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("meta_title[$key]", trans('blog::blog.meta_title') . " ($language)") !!}
                {!! Form::text("meta_title[$key]", null, ['class' => 'form-control input-lg', 'required']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("meta_description[$key]", trans('blog::blog.meta_description') . " ($language)") !!}
                {!! Form::text("meta_description[$key]", null, ['class' => 'form-control input-lg', 'required']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("short_description[$key]", trans('blog::blog.short_description') . " ($language)") !!}
                {!! Form::textarea("short_description[$key]", null, ['class' => 'form-control input-lg', 'required']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label("description[$key]", trans('blog::blog.description') . " ($language)") !!}
                {!! Form::textarea("description[$key]", null, ['class' => 'form-control input-lg', 'required']) !!}
            </div>
        </div>
    </div>
@endforeach
