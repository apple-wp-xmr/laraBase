<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\CreateRequest;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;


class WorkerController extends Controller
{
    public function index(IndexRequest $request){
        $data =  $request->validated();

        $workersQuery = Worker::query();
        if(isset($data['name'])){
            $workersQuery->where('name', 'like', "%{$data['name']}%");
        }
        if(isset($data['surname'])){
            $workersQuery->where('surname', 'like', "%{$data['surname']}%");
        }
        if(isset($data['from'])){
            $workersQuery->where('age', '>',  $data['from']);
        }
        if(isset($data['to'])){
            $workersQuery->where('age', '<', $data['to'] );
        }
        if(isset($data['description'])){
            $workersQuery->where('description', 'like', "%{$data['description']}%");
        }
        if(isset($data['email'])){
            $workersQuery->where('email', 'like', "%{$data['email']}%");
        }
        if(isset($data['is_married'])){
            $workersQuery->where('is_married', true);
        }
        $workers = $workersQuery->paginate(3);

        return view('workers.index', compact('workers'));
    }

    public function show(Worker $worker){
        return view('workers.show', compact('worker'));
    }

    public function create(){
        $this->authorize('create', Worker::class);
        return view('workers.create');
    }

    public function store(StoreRequest $request){
        $this->authorize('create', Worker::class);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker = Worker::create($data);
        return redirect()->route('workers.show', $worker->id);
    }

    public function edit(Worker $worker){
        $this->authorize('create', $worker);
        return view('workers.edit', compact('worker'));
    }

    public function update(UpdateRequest $request, Worker $worker){
        $this->authorize('create', $worker);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker->update($data);
        return redirect()->route('workers.show', $worker->id);
    }

    public function destroy(Worker $worker){
        $this->authorize('delte', $worker);
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
