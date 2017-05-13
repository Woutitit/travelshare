<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script type="text/javascript">
            if (window.location.hash && window.location.hash == '#_=_') {
                if (window.history && history.pushState) {
                    window.history.pushState("", document.title, window.location.pathname);
                } else {
                    var scroll = {
                        top: document.body.scrollTop,
                        left: document.body.scrollLeft
                    };
                    window.location.hash = '';
                    document.body.scrollTop = scroll.top;
                    document.body.scrollLeft = scroll.left;
                }
            }
        </script>
    </head>
    <body>
        <div id="app">
            <!-- Ook nog 1 voor login scherm maken -->
            @if (Route::getCurrentRoute()->uri() == '/')
            @include('layouts.page--front')
            @else
            @include('layouts.page')
            @endif

            <!-- Popovers -->
            <v-popover class="Popover Popover--user-actions" placement="bottom">
            <v-ul class="List List--user-actions">
                <v-li class="List__item">
                    <v-link class="Link u--linkClean" link="{{ url('me/profile') }}">Profiel</v-link>
                </v-li>
                <v-li class="List__item">
                    <v-link class="Link u--linkClean" link="{{ url('me/requests') }}">Verzoeken</v-link>
                </v-li>
                <v-li class="List__item">
                    <v-link class="Link u--linkClean" link="{{ url('me/transactions') }}">Transacties</v-link>
                </v-li>
                <v-li class="List__item">
                    <v-link class="Link u--linkClean" link="{{ url('/logout') }}">Afmelden</v-link>
                </v-li>
            </v-ul>
            </v-popover>
        </div>
        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
    </html>
