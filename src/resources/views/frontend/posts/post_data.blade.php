@if ($post->image)
    <img src="{{ $post->image }}" class="img-responsive post-image">
@endif

<p>
    <small>
        <i class="fa fa-clock-o"></i> {{ $post->created_at->format('d-m-Y') }}
        &nbsp;
        @foreach ($post->postCategories as $postCategory)
            <i class="fa fa-tag"></i>
            <a href="{{ url($postCategory->route) }}">{{ $postCategory->title_translated }}</a>
        @endforeach
    </small>
</p>
