<p>
    <small>
        <i class="fa fa-clock-o"></i> {{ $post->created_at->format('d-m-Y') }}
        &nbsp;
        <i class="fa fa-tag"></i> <a href="{{ url($post->postCategory->route) }}">{{ $post->postCategory->title_translated }}</a>
    </small>
</p>
