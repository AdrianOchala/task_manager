<?php

namespace Database\Seeders;

use App\Actions\Tasks\CreateTask;
use App\Data\Tasks\TaskData;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = User::all();

        foreach(Task::factory(10)->raw() as $taskData) {
            new CreateTask(TaskData::from([
                ...$taskData,
                ...[
                    'assignee' => $employees->random(),
                ]
                ]),
                $employees->random()
            )->execute();
        }
    }
}
