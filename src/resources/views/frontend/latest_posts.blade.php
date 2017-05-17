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
