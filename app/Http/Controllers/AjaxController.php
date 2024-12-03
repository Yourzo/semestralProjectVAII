<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function setTasks(Request $request, $deskId) : JsonResponse
    {
        $dest_col = $request->dest_column;
        if (!in_array($dest_col, ['todo', 'doing', 'done'])) {
            return response()->json(['success' => false, 'message' => 'Invalid column parameter.']);
        }

        $desk = Desk::find($deskId);
        if (!$desk && !in_array(auth()->id(),Desk::find($deskId)->users()->withPivot('user_id')->pluck('user_id'))) {
            return response()->json(['success' => false, 'message' => 'Desk does not exist.']);
        }
        Task::where('id', $request->task_id)->update(['status' => $dest_col]);

        return response()->json(['success' => true]);
    }

    public function createTask(Request $request, $deskId) : JsonResponse
    {
        $request->validate(['name' => 'required|string|max:255']);
        $task_col = $request->status;
        if (!in_array($task_col, ['todo', 'doing', 'done'])){
            return response()->json(['success' => false, 'message' => 'Invalid column parameter.']);
        }

        $task = new Task();
        $task->name = $request->name;
        $task->desk_id = $deskId;
        $task->user_id = auth()->id();
        $task->status = $task_col;
        $task->save();
        return response()->json(['success' => true, 'message' => 'Task created successfully.']);
    }

    public function getTasks(Request $request, $deskId) : JsonResponse
    {
        return response()->json([
        'todo' => Task::where([['user_id',$request->id], ['status', 'todo']])->get(),
        'doing' => Task::where([['user_id',$request->id], ['status', 'doing']])->get(),
        'done' => Task::where([['user_id',$request->id], ['status', 'done']])->get(),
        ]);
    }
}
