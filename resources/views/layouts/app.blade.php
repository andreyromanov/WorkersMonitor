<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Latest compiled and minified CSS -->


    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/botui/build/botui.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/botui/build/botui-theme-default.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link class="navbar-brand" to="/">Мониторинг</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item">
                            <router-link class="nav-link" to="/botui">BotUI</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/chat">Чат</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/">Создать</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/show">Показать</router-link>
                        </li>
                    </ul>
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input @keyup="searchit" v-model="search" class="form-control form-control-navbar" type="search"
                            placeholder="Поиск по ФИО" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" @click="searchit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div>

            <router-view></router-view>

        </div>
    </div>
       
    <!-- Scripts -->

    




<script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/script.js') }}" defer></script>
      
</body>

</html>
