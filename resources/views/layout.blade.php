<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    <link rel="shortcut icon" href="{{ asset('/vendor/horizon/img/favicon.png') }}">--}}

    <title>Application Database Designer</title>

    <!-- Style sheets-->
    {{--    <link href="{{ asset(mix($cssFile, 'vendor/db-designer')) }}" rel="stylesheet">--}}
</head>
<body class="h-full overflow-hidden">
<div id="db-designer">
</div>

@vite('resources/js/app.js', 'vendor/db-designer/build')
</body>
</html>
