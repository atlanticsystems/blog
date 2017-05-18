@if ($categories)
    <div class="categories">
        <h3>@lang('blog::blog.blog_categories')</h3>

        <hr>

        @foreach ($categories as $category)
            <div class="category">
                <h4>
                    <a href="{{ url($category->route) }}">
                        {{ $category->title_translated }}
                        <span class="badge">{{ $category->posts_count }} {{ strtolower(trans('blog::blog.posts')) }}</span>
                    </a>
                </h4>
            </div>
        @endforeach
    </div>
@endif
