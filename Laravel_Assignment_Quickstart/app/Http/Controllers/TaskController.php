<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('task.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => "required|min:3|max:30",
        ]);
        $task = new Task;
        $task->name = request('task');
        $task->save();
        return redirect()->route('task.index');
    }

    public function edit($id)
    {
        $post = Task::find($id);

        return view('task.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        Task::find($id)->update([
            'name' => $request->task
        ]);
        return redirect('task');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index');
    }
}
