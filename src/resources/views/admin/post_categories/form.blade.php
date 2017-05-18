<h2>
    @lang('blog::blog.category_data')

    <div class="btn-group pull-right form-group" role="group">
        {!! Form::button('<i class="fa fa-floppy-o"></i> ' . trans('blog::blog.save'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}

        <a href="{{ url('admin/post_categories') }}" class="btn btn-danger">
            <i class="fa fa-times"></i> @lang('blog::blog.close')
        </a>
    </div>
</h2>

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
                            {!! Form::label("alias[$key]", trans('blog::blog.alias')) !!}
                            {!! Form::text("alias[$key]", null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
