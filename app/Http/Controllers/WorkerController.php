<?php

namespace App\Http\Controllers;

use App\Http\Filters\V1\WorkerFilter;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;


class WorkerController extends Controller
{
    public function index(IndexRequest $request){

        $data =  $request->validated();
        
        $filter = app()->make(WorkerFilter::class, ['params' => $data]);
        $workerQuery = Worker::filter($filter);

        $workers = $workerQuery->paginate(3);

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
