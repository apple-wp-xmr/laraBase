<?php

namespace App\Console\Commands;

use App\Models\Profile;
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
        dd($worker->profile->toArray());
    }

    public function populate(){
        $worker = Worker::create([
            'name' => 'Salim',
            'surname' => 'Kotovich',
            'email' => 'thesalimankotovich@gmail.com',
            'age' => 22,
            'description' => 'I am usual cat. I want to catch a mouse',
            'is_married' => true
        ]);

        $profile = Profile::create([
            'worker_id' => $worker->id,
            'city' => 'Poltava',
            'skill' => 'mice catcher',
            'experience' => 'I am here not to answer that type of questions',
        ]);

    }
}
