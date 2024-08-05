<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Project 1',
                'description' => 'Description for project 1',
                'status' => 'in_progress',
                'serial' => 1,
            ],
            [
                'title' => 'Project 2',
                'description' => 'Description for project 2',
                'status' => 'completed',
                'serial' => 2,
            ],
            [
                'title' => 'Project 3',
                'description' => 'Description for project 3',
                'status' => 'pending',
                'serial' => 3,
            ],
            // Add more projects as needed
        ]);
    }
}