<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(){
        $workers = Worker::all();
        return view('worker.index', compact('workers'));
    }
    public function show(Worker $worker){
        return view('worker.show', compact('worker'));
    }
    public function create(){
        $workers =  array(
            'name' => 'dimas2',
            'surname' => 'RandomSername',
            'email' => 'rund2l@gmail.com',
        );
        Worker::create($workers);
        return 'success';
    }
    public function edit(Worker $worker){
        $worker->update(['name' => 'NewDimas']);
        return 'success';
    }
    public function update(){
    }
    public function delete(Worker $worker){
        $worker->delete();
        return 'delete';
    }

}
