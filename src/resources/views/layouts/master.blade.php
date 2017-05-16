<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>@yield('title', trans('blog::blog.blog'))</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('metas')

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            @yield('content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript">
            (function () {
                var laravel = {
                    initialize: function () {
                        this.methodLinks = window.$('a.send-form');
                        this.registerEvents();
                    },

                    registerEvents: function () {
                        this.methodLinks.on('click', this.handleMethod);
                    },

                    handleMethod: function (e) {
                        var link = window.$(this);
                        var httpMethod = link.data('method').toUpperCase();
                        var form;

                        // If the data-method attribute is not PUT or DELETE,
                        // then we don't know what to do. Just ignore.
                        if (window.$.inArray(httpMethod, ['PUT', 'DELETE', 'POST', 'PATCH']) === -1) {
                            return;
                        }

                        // Allow user to optionally provide data-confirm="Are you sure?"
                        if (link.data('confirm')) {
                            if (!laravel.verifyConfirm(link)) {
                                return false;
                            }
                        }

                        form = laravel.createForm(link);
                        form.submit();

                        e.preventDefault();
                    },

                    verifyConfirm: function (link) {
                        return window.confirm(link.data('confirm'));
                    },

                    createForm: function (link) {
                        var form = window.$('<form>', {
                            'method': 'POST',
                            'action': link.attr('href'),
                        });

                        var token = window.$('<input>', {
                            'type': 'hidden',
                            'name': '_token',
                            'value': window.$('meta[name="_token"]').attr('content'),
                        });

                        var hiddenInput = window.$('<input>', {
                            'type': 'hidden',
                            'name': '_method',
                            'value': link.data('method'),
                        });

                        return form.append(token, hiddenInput).appendTo('body');
                    }
                }

                laravel.initialize();
            })();
        </script>
    </body>
</html>
