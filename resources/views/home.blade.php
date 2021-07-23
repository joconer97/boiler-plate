<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style scoped>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

        html {
            overflow-y: auto !important;
        }
        .v-list-item, a.v-btn {
            text-decoration: none!important;
        }
        .v-application{
            font-family: 'Inter' !important;
        }
        .font-10{
            font-size: 10px;
        }
      
    </style>
</head>
<body>
    <div v-cloak id="app">
        <router-view></router-view>
    </div>
</body>
</html>
