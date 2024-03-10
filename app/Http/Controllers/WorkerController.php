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

        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker){
        return view('worker.show', compact('worker'));
    }

    public function create(){
        return view('worker.create');
    }

    public function store(CreateRequest $request){
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker = Worker::create($data);
            
        return redirect()->route('worker.show', $worker->id);
    }

    public function edit(Worker $worker){
        return view('worker.edit', compact('worker'));
    }

    public function update(UpdateRequest $request, Worker $worker){
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker->update($data);
        return redirect()->route('worker.show', $worker->id);
    }

    public function delete(Worker $worker){
        $worker->delete();
         return redirect()->route('worker.index');
    }
}
