<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(){
        $workers = Worker::all();
        return WorkerResource::collection($workers);
    }

    public function show(Worker $worker){
        return WorkerResource::make($worker);
    }

    public function store(){
        
    }
}
