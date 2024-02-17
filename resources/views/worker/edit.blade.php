@extends('layout.main')

@section('content')
    <div>
        <form action="{{ route('worker.update', $worker->id) }}" method="Post">
            @csrf
            @method('patch')
            <div><input type="text" name="name" value="{{ old('name') ?? $worker->name }}" placeholder="name"></div>
            <div><input type="text" name="surname" value="{{ $worker->surname }}" placeholder="surname"></div>
            <div><input type="text" name="email" value="{{ $worker->email }}" placeholder="email"></div>
            <div><input type="number" name="age" value="{{ $worker->age }}" placeholder="age"></div>
            <div>
                <textarea style="resize: none" type="text" name="description" placeholder="Describe yourself here...">{{ $worker->description }}</textarea>
            </div>
            <div>
                <input type="checkbox" name="is_married" {{ $worker->is_married ? 'checked' : '' }}>
                <label for="is_married">Is married</label>
            </div>
            <input type="submit" value="сохранить">
        </form>
        <a href="{{ route('worker.index') }}">Назад</a>
    </div>
@endsection
