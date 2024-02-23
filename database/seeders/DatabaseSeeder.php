<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $workers = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'john@example.com',
                'age' => 30,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'is_married' => true,
            ],
            [
                'name' => 'Jane',
                'surname' => 'Doe',
                'email' => 'jane@example.com',
                'age' => 28,
                'description' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'is_married' => false,
            ],
            [
                'name' => 'Michael',
                'surname' => 'Smith',
                'email' => 'michael@example.com',
                'age' => 35,
                'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'is_married' => true,
            ],
            [
                'name' => 'Emily',
                'surname' => 'Johnson',
                'email' => 'emily@example.com',
                'age' => 25,
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'is_married' => false,
            ],
            [
                'name' => 'David',
                'surname' => 'Williams',
                'email' => 'david@example.com',
                'age' => 40,
                'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'is_married' => true,
            ],
            [
                'name' => 'Emma',
                'surname' => 'Brown',
                'email' => 'emma@example.com',
                'age' => 27,
                'description' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'is_married' => false,
            ],
            [
                'name' => 'James',
                'surname' => 'Jones',
                'email' => 'james@example.com',
                'age' => 33,
                'description' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.',
                'is_married' => true,
            ],
            [
                'name' => 'Olivia',
                'surname' => 'Garcia',
                'email' => 'olivia@example.com',
                'age' => 29,
                'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.',
                'is_married' => false,
            ],
            [
                'name' => 'William',
                'surname' => 'Martinez',
                'email' => 'william@example.com',
                'age' => 31,
                'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.',
                'is_married' => true,
            ],
            [
                'name' => 'Ava',
                'surname' => 'Hernandez',
                'email' => 'ava@example.com',
                'age' => 26,
                'description' => 'Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
                'is_married' => false,
            ],
            // Add more worker data as needed
        ];
        

        foreach ($workers as $worker) {
            DB::table('workers')->insert($worker);
        }
    }
}
