<?php

namespace Database\Seeders;

use App\Enums\TaskStatusEnum;
use App\Models\Domain\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::truncate();

        $tasks = [
            [
                'user_id' => 1,
                'title' => 'Do homework',
                'status' => TaskStatusEnum::COMPLETED,
            ],
            [
                'user_id' => 1,
                'title' => 'Go shopping',
            ],
            [
                'user_id' => 2,
                'title' => 'Go to gym',
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}