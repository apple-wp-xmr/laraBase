@extends('layout.main')


@section('content')
    <form action="{{ route('worker.store') }}" method="post">
        @csrf
        <div>
            <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
        </div>
        @error('name')
            {{ $message }}
        @enderror
        <div>
            <input type="text" name="surname" placeholder="surname" value="{{ old('surname') }}">
        </div>
        @error('surname')
            {{ $message }}
        @enderror
        <div>
            <input type="number" name="age" placeholder="age" value="{{ old('age') }}">
        </div>
        @error('age')
            {{ $message }}
        @enderror
        <div>
            <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
        </div>
        @error('email')
            {{ $message }}
        @enderror
        <div>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        @error('description')
            {{ $message }}
        @enderror
        <div>
            <input type="checkbox" name='is_married' {{ old('is_married') ? 'checked' : '' }}>
        </div>
        @error('checkbox')
            {{ $message }}
        @enderror
        <input type="submit" value="Отправить">
    </form>
@endsection
