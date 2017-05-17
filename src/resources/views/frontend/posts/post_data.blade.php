<p>
    <small>
        @lang('blog::blog.published'): <b>{{ $post->created_at->format('d-m-Y') }}</b>
        &nbsp;|&nbsp;
        @lang('blog::blog.category'): <b><a href="{{ url($post->postCategory->route) }}">{{ $post->postCategory->title_translated }}</a></b>
    </small>
</p>

<hr>
