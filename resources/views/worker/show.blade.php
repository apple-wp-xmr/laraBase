@extends('layout.main')

@section('content')
    <div>
        <div class="">{{ $worker->name }}</div>
        <div class="">{{ $worker->surname }}</div>
        <div class="">{{ $worker->eamil }}</div>
        <div class="">{{ $worker->age }}</div>
        <div class="">{{ $worker->description }}</div>
        <div class="">Is married: {{ $worker->is_married }}</div>
        <a href="{{ route('worker.index') }}">Назад</a>
    </div>
@endsection
