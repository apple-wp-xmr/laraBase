@extends('layout.main')


@section('content')
    <div>{{ $worker->name }}</div>
    <div>{{ $worker->surname }}</div>
    <div>{{ $worker->age }}</div>
    <div>{{ $worker->email }}</div>
    <div>{{ $worker->description }}</div>
    <div>{{ $worker->is_married }}</div>

    <a href="{{ route('worker.index') }}">назад</a>
@endsection
