<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Foundry Chat</title>

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('js/my_css.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="/images/brand-logo.png">

    {{--    <script src="{{ asset('js/lib/vuelidate.min.js') }}"></script>--}}
{{--    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>--}}
    <link rel="stylesheet" href="https://unpkg.com/vue-agile/dist/VueAgile.css">

    {{--    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.0/dist/flowbite.min.css">--}}
{{--    <script src="{{ asset('js/lib/validators.min.js') }}"></script>--}}

    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>

    <script src="{{ mix('js/app.js') }}" defer ></script>

    <style>
        .text-dim {
            color: #A7BBC8;
        }

        a {
            color: #1a202c;
            text-decoration: none !important;
        }

        [v-cloak] > * {
            display: none
        }

        [v-cloak]::before {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 3px solid blue;
            border-right: 3px solid green;
            border-bottom: 3px solid red;
            border-left: 3px solid pink;
            width: 40px;
            height: 40px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .loading {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 3px solid blue;
            border-right: 3px solid green;
            border-bottom: 3px solid red;
            border-left: 3px solid pink;
            width: 40px;
            height: 40px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body class="antialiased">
<div id="app" v-cloak>
    <app/>
</div>
<script>
    if (localStorage.getItem('sidebar-expanded') === 'true') {
        document.querySelector('body').classList.add('sidebar-expanded');
    } else {
        document.querySelector('body').classList.remove('sidebar-expanded');
    }
</script>
</body>
</html>
