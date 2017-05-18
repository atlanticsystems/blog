@if ($latest_posts)
    <div class="latest-posts">
        <h3>@lang('blog::blog.latest_posts')</h3>

        <hr>

        @foreach ($latest_posts as $post)
            <div class="post media">
                @if ($post->thumb)
                    <div class="media-left media-middle">
                        <a href="{{ url($post->route) }}"><img src="{{ $post->thumb }}" class="media-object"></a>
                    </div>
                @endif

                <div class="media-body">
                    <h4 class="title">
                        <a href="{{ url($post->route) }}">{{ $post->title_translated }}</a>
                    </h4>

                    <small>
                        <i class="fa fa-clock-o"></i> {{ $post->created_at->format('d-m-Y') }}
                    </small>
                </div>
            </div>
        @endforeach
    </div>
@endif
