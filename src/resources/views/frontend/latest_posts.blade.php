@if ($latest_posts)
    <div class="latest-posts">
        <h3>@lang('blog::blog.latest_posts')</h3>

        <hr>

        @foreach ($latest_posts as $post)
            <div class="post">
                <h4 class="title"><a href="{{ url($post->route) }}">{{ $post->title_translated }}</a></h4>
                <small><i class="fa fa-clock-o"></i> {{ $post->created_at->format('d-m-Y') }}</small>
            </div>
        @endforeach
    </div>
@endif
