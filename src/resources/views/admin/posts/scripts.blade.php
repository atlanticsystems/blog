@section('scripts')
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            @foreach (config('blog.languages') as $key => $language)
                CKEDITOR.replace('short_description[{{ $key }}]');
                CKEDITOR.replace('description[{{ $key }}]');
            @endforeach

            $('.select2').select2();
        });
    </script>
@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
