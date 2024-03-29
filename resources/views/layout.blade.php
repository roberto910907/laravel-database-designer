<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    <link rel="shortcut icon" href="{{ asset('/vendor/horizon/img/favicon.png') }}">--}}

    <title>Database Designer</title>
</head>
<body class="h-full overflow-hidden">
<div id="db-designer" class="flex h-full flex-col">
</div>

@vite('resources/js/app.js', 'vendor/db-designer/build')
</body>
</html>
