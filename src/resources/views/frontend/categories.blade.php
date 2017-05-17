@if ($categories)
    <h3>@lang('blog::blog.blog_categories')</h3>

    <hr>

    <ul class="list-unstyled">
        @foreach ($categories as $category)
            <li>
                <a href="{{ url($category->route) }}">{{ $category->title_translated }} <span class="label label-primary">{{ $category->posts_count }}</span></a>
            </li>
        @endforeach
    </ul>
@endif
