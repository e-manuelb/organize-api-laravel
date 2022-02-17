<?php

namespace App\Http\Controllers;

use App\Http\Resources\ToDoResource;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $tasks = ToDo::paginate(15);
        return ToDoResource::collection($tasks);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if (ToDo::create($data)) {
            return new ToDoResource($data);
        }
    }

    public function show($id)
    {
        $task = ToDo::findOrFail($id);
        return new ToDoResource($task);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $task = ToDo::findOrFail($id);

        if ($task->update($data)) {
            return new ToDoResource($data);
        }
    }

    public function destroy($id)
    {
        $task = ToDo::findOrFail($id);
        if ($task->delete()) {
            return new ToDoResource($task);
        }
    }
}
