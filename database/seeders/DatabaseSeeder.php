<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Position;
use App\Models\Worker;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            PositionSeeder::class,
            WorkerSeeder::class
        ]);
    }
}
