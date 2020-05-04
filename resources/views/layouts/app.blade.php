<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="base-url" content="{{ env('APP_URL') }}" />
    <!-- Scripts -->
    @include('layouts.admin-lite.includes.head')
   <?php Feed::link(url('feed'), 'atom', 'My Feed', 'en');?>
</head>

<body class="sidebar-mini skin-blue">
          <div id="app">
           <app-home></app-home>
          </div>
<script src="{{ asset('js/app.js') }}" defer></script>
@include('layouts.admin-lite.scripts.scripts')
</body>
</html>

