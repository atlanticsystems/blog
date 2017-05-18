@section('scripts')
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            @foreach (config('blog.languages') as $key => $language)
                CKEDITOR.replace('short_description[{{ $key }}]');
                CKEDITOR.replace('description[{{ $key }}]');
            @endforeach
        });
    </script>
@endsection
