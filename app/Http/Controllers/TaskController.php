<?php

namespace App\Http\Controllers;

use App\Actions\Tasks\CreateTask;
use App\Actions\Tasks\DeleteTask;
use App\Data\Tasks\TaskData;
use App\Http\Resources\TaskResource;
use App\Http\Responses\CreatedResponse;
use App\Http\Responses\EmptyResponse;
use App\Http\Responses\WrappedResponse;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index(): WrappedResponse
    {
        return new WrappedResponse(TaskResource::collection(Task::all()));
    }

    public function show(string $hashId): WrappedResponse
    {
        return new WrappedResponse(new TaskResource(Task::byHashOrFail($hashId)));
    }

    public function store(TaskData $data): CreatedResponse
    {
        $task = new CreateTask($data, User::findOrFail(auth()->id()))->execute();

        return new CreatedResponse($task);
    }

    public function destroy(string $hashId): EmptyResponse
    {
        new DeleteTask(Task::byHashOrFail($hashId))->execute();

        return new EmptyResponse();
    }
}
