<?php

namespace App\Console\Commands;

use App\Http\Filters\V1\WorkerFilter;
use App\Jobs\SomeJob;
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
        $workerQuery = Worker::query();

        $filter = new WorkerFilter(['from' => 60]);
        $filter->applyFilter($workerQuery);

        dd($workerQuery->get());
    }
}
