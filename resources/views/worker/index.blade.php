@extends('layout.main')

@section('content')
    <div><a href="{{ route('worker.create') }}">Add one more</a></div>
    <hr>
    <div>
        <form action="{{ route('worker.index') }}" method="get">
            <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
            <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
            <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
            <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
            <input type="text" name="description" placeholder="description" value="{{ request()->get('description') }}">
            <input type="checkbox" name="is_married" {{ request()->get('is_married') == 'on' ? 'checked' : '' }}>
            <label for="is_married">is married</label>
            <input type="submit" value="Filter">
            <a href="{{ route('worker.index') }}">Clear</a>
        </form>
    </div>
    <hr>
    @foreach ($workers as $worker)
        <div>
            <div class="">{{ $worker->name }}</div>
            <div class="">{{ $worker->surname }}</div>
            <div class="">{{ $worker->email }}</div>
            <div class="">{{ $worker->age }}</div>
            <div class="">{{ $worker->description }}</div>
            <div class="">{{ $worker->is_married }}</div>

            <a href="{{ route('worker.show', $worker->id) }}">Посмотреть</a><br>
            <a href="{{ route('worker.edit', $worker->id) }}">Редактировать</a><br>
            <form action="{{ route('worker.delete', $worker->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Удалить</button>
            </form>
            <hr>
        </div>
    @endforeach

    <div class="my-nav">
        {{ $workers->withQueryString()->links() }}
    </div>
@endsection
