<?php

namespace App\Console\Commands;

use App\Http\Filters\V2\Worker\Age;
use App\Jobs\SomeJob;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;

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

        request()->merge(['age' => 27]);
        $workers = app()->make(Pipeline::class)
            ->send(Worker::query())
            ->through([
                Age::class
            ])
            ->thenReturn();

        dd($workers->get());
    }
}
