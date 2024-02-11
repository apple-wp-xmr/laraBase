<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="">{{ $worker->name }}</div>
        <div class="">{{ $worker->surname }}</div>
        <div class="">{{ $worker->eamil }}</div>
        <div class="">{{ $worker->age }}</div>
        <div class="">{{ $worker->description }}</div>
        <div class="">{{ $worker->is_married }}</div>
        <a href="{{ route('worker.index') }}">Назад</a>
    </div>
</body>

</html>
