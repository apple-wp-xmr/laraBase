<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'develop command custom created';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $worker = Worker::find(1);
        $worker->update([
            'age' => '76.00'
        ]);
    }

    public function populate(){
        $client = Client::find(1);
        $client->avatar()->create([
            'path' => 'client1 avatar'
        ]);
        $client->reviews()->create([
            'text' => 'abc'
        ]);
        $client->reviews()->create([
            'text' => 'abcd'
        ]);
        $worker = Worker::find(1);
        $worker->avatar()->create([
            'path' => 'worker1 avatar'
        ]);
        $client->tags()->attach([1]);
    }

    public function createTags(){
        Tag::create([
            'title' => 'developer'
        ]);
        Tag::create([
            'title' => 'big boss'
        ]);
    }

    public function createClient(){
        $client = Client::create([
            'name' => 'Saliman'
        ]);
        $client2 = Client::create([
            'name' => 'Jastin'
        ]);
        $client3 = Client::create([
            'name' => 'Bob'
        ]);
    }

    public function prepareData(){

        $department1 = Department::create([
            'title' => 'Development'
        ]);
        $department2 = Department::create([
            'title' => 'IT'
        ]);

        $position1 = Position::create([
            'title' => 'Developer',
            "department_id" =>   $department1->id
        ]);

        $position2 = Position::create([
            'title' => 'Manager',
            "department_id" =>   $department1->id
        ]);
        $position3 = Position::create([
            'title' => 'Designer',
            "department_id" =>   $department1->id
        ]);


        
        $worker1 = Worker::create([
            'name' => 'Ivan',
            'surname' => 'Kotovich',
            'email' => 'thesalimankotovich@gmail.com',
            'position_id' => $position1->id,
            'age' => 22,
            'description' => 'I am usual cat. I want to catch a mouse',
            'is_married' => true
        ]);
        $worker2 = Worker::create([
            'name' => 'Karl',
            'surname' => 'Pitrov',
            'email' => 'karl@gmail.com',
            'position_id' => $position2->id,
            'age' => 28,
            'description' => 'Some description',
            'is_married' => true
        ]);
        $worker3 = Worker::create([
            'name' => 'Kate',
            'surname' => 'Krassavina',
            'email' => 'kate@gmail.com',
            'position_id' => $position1->id,
            'age' => 18,
            'is_married' => false
        ]);
        $worker4 = Worker::create([
            'name' => 'Alex',
            'surname' => 'Smith',
            'email' => 'alex@example.com',
            'position_id' => $position3->id,
            'age' => 30,
            'description' => 'Experienced professional with a passion for innovation.',
            'is_married' => false
        ]);
        $worker5 = Worker::create([
            'name' => 'Maria',
            'surname' => 'Gonzalez',
            'email' => 'maria@example.com',
            'position_id' => $position3->id,
            'age' => 25,
            'description' => 'Detail-oriented and dedicated team player.',
            'is_married' => true
        ]);
        $worker6 = Worker::create([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john@example.com',
            'position_id' => $position3->id,
            'age' => 35,
            'description' => 'Highly skilled professional with years of experience.',
            'is_married' => false
        ]);


        $worker1->profile()->create([
            'city' => 'Kyiv',
            'skill' => 'backend developer',
            'experience' => 10,
            'finished_study_at' => '2014-06-01'
        ]);

        $worker2->profile()->create([
            'city' => 'Rio',
            'skill' => 'Boss',
            'experience' => 10,
            'finished_study_at' => '2014-06-01'
        ]);

        $worker3->profile()->create([
            'city' => 'Oslo',
            'skill' => 'front-end',
            'experience' => 1,
            'finished_study_at' => '2021-06-01'
        ]);
        
        $worker4->profile()->create([
            'city' => 'Berlin',
            'skill' => 'backend developer',
            'experience' => 3,
            'finished_study_at' => '2018-12-15'
        ]);

        $worker5->profile()->create([
            'city' => 'Paris',
            'skill' => 'data analyst',
            'experience' => 2,
            'finished_study_at' => '2019-10-20'
        ]);
 
    }

    public function prepareManyToMany(){

        $workerManager = Worker::find(2);
        $workerBackend = Worker::find(1);

        $workerDesigner1 = Worker::find(5);
        $workerDesigner2 = Worker::find(6);

        $workerFrontEnd1 = Worker::find(4);
        $workerFrontEnd2 = Worker::find(3);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);
        $project2 = Project::create([
            'title' => 'Blog'
        ]);


        $project1->workers()->attach([
            $workerManager->id,
            $workerDesigner1->id,
            $workerFrontEnd1->id
        ]);

        $project1->workers()->attach([
            $workerBackend->id,
            $workerManager->id,
            $workerDesigner1->id,
            $workerDesigner2->id,
            $workerFrontEnd2->id
        ]);

    }

}
