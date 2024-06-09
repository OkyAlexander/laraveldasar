<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include('layout/head')
    @include('layout/navbar')
    <div class="mt-5" align="center">
    <h1>WELCOME TO LARAVEL <img src="{{asset('AdminLTE')}}/dist/img/pp.gif" width="200px"></h1>
    </div>
    
    @include('layout/footer')
</body>
</html>