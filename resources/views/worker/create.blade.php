@extends('layout.main')

@section('content')
    <div>
        <form action="{{ route('worker.store') }}" method="Post">
            @csrf
            <div>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="name">
                <div>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <input type="text" name="surname" value="{{ old('surname') }}" placeholder="surname">
                <div>
                    @error('surname')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="email">
                <div>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <input type="number" name="age" value="{{ old('age') }}" placeholder="age">
                <div>
                    @error('age')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <textarea style="resize: none" type="text" name="description" placeholder="Describe yourself here...">{{ old('description') }}</textarea>
                <div>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <input type="checkbox" name="is_married" {{ old('is_married') == 'on' ? 'checked' : '' }}>
                <label for="is_married">Is married</label>
            </div>
            <input type="submit">
        </form>
        <a href="{{ route('worker.index') }}">Назад</a>
    </div>
@endsection
