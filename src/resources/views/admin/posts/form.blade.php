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
            {!! Form::select('published', [1 => 'Publicado', 0 => 'Borrador'], null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('post_category_id', trans('blog::blog.category')) !!}
            {!! Form::select('post_category_id', $categories, null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('image', trans('blog::blog.image')) !!}
            {!! Form::file('image') !!}
        </div>
    </div>
</div>

<hr>

<div>
    <ul class="nav nav-tabs" role="tablist">
        @foreach (config('blog.languages') as $key => $language)
            <li role="presentation"{!! $loop->first ? ' class="active"' : '' !!}>
                <a href="#{{ $key }}" aria-controls="{{ $key }}" role="tab" data-toggle="tab">{{ $language }}</a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content">
        @foreach (config('blog.languages') as $key => $language)
            <div role="tabpanel" class="tab-pane{{ $loop->first ? ' active' : '' }}" id="{{ $key }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("title[$key]", trans('blog::blog.title')) !!}
                            {!! Form::text("title[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("subtitle[$key]", trans('blog::blog.subtitle')) !!}
                            {!! Form::text("subtitle[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("alias[$key]", trans('blog::blog.alias')) !!}
                            {!! Form::text("alias[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("meta_title[$key]", trans('blog::blog.meta_title')) !!}
                            {!! Form::text("meta_title[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label("meta_description[$key]", trans('blog::blog.meta_description')) !!}
                            {!! Form::text("meta_description[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label("short_description[$key]", trans('blog::blog.short_description')) !!}
                            {!! Form::textarea("short_description[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label("description[$key]", trans('blog::blog.description')) !!}
                            {!! Form::textarea("description[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
