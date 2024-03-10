@extends('layout.main')


@section('content')
    <div>
        <a href="{{ route('worker.create') }}">Create New</a>
    </div>
    <div>
        <form action="{{ route('worker.index') }}" method="GET">
            <input type="text" name="name" placeholder="name" value="{{ request()->name }}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()->surname }}">
            <input type="number" name="from" placeholder="from" value="{{ request()->from }}">
            <input type="number" name="to" placeholder="to" value="{{ request()->to }}">
            <input type="text" name="description" placeholder="description" value="{{ request()->description }}">
            <input type="text" name="email" placeholder="email" value="{{ request()->email }}">
            <label for="is_married">Is Married</label>
            <input type="checkbox" name="is_married" {{ request()->is_married ? 'checked' : '' }}>

            <input type="submit" value="Filter">

            <a href="{{ route('worker.index') }}">Clear</a>
        </form>
    </div>
    @foreach ($workers as $worker)
        <div>{{ $worker->name }}</div>
        <div>{{ $worker->surname }}</div>
        <div>{{ $worker->age }}</div>
        <div>{{ $worker->email }}</div>
        <div>{{ $worker->description }}</div>
        <div>{{ $worker->is_married }}</div>
        <div>
            <a href="{{ route('worker.show', $worker->id) }}">Show</a>
        </div>
        <div>
            <a href="{{ route('worker.edit', $worker->id) }}">Edit</a>
        </div>
        <div>
            <form action="{{ route('worker.delete', $worker->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </div>
        <hr>
    @endforeach

    <div class="navigation">
        {{ $workers->withQueryString()->links() }}
    </div>
@endsection
