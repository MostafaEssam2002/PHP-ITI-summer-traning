<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
      {{-- bootstrap  css --}}
<x-bootstrap-css></x-bootstrap-css>

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

<x-navbar></x-navbar>

        <h1 style="text-align: center; color:rgb(191, 16, 16)">PHP G2 Laravel</h1>

<div class="d-flex justify-content-around">
<a href="{{route('students.index')  }}">
    <x-button class="info" name='All Students Data' />

</a>
<a href="{{ route('tracks.index') }}">
        <x-button class="success" name='All Tracks Data' />

</a>
</div>
<x-footer></x-footer>

<x-bootstrap-js></x-bootstrap-js>
    </body>
</html>
