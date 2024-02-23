@extends('layout.main')


@section('content')
    <div>
        <a href="{{ route('worker.create') }}">Create New</a>
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
        {{ $workers->links() }}
    </div>
@endsection
