<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->with('status')->paginate(10);
        return view('task.list', ['tasks' => $tasks, 'total_task' => count(Task::all())]);
    }

    public function create()
    {
        $statuses = Status::all();
        return view('task.create', ['statuses' => $statuses]);
    }

    public function update($id)
    {
        $task = Task::where('id', $id)->with('status')->first();
        $statuses = Status::all();
        if ($task === null) {
            return redirect()->to('/')->withErrors(array('idNotFound' => 'No data found'));
        } else return view('task.update', ['task' => $task, 'statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description',
            'status',
        ]);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $task = new Task();

        $task['title'] = $request->title;
        $task['description'] = $request->description;
        $task['status_id'] = $request->status;

        $task->save();

        return redirect()->to('/')->withSuccess('Task added successfully');
    }

    public function edit(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description',
            'status',
        ]);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $task = Task::where('id', $id)->first();

        $task['title'] = $request->title;
        $task['description'] = $request->description;
        $task['status_id'] = $request->status;

        $task->save();

        return redirect()->to('/')->withSuccess('Task edited successfully');
    }

    public function show($id)
    {
        $task = Task::where('id', $id)->first();
        return view('task.view', ['task' => $task]);
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->first();

        if (!$task) {
            return redirect()->to('/')->withSuccess('Invalid task');
        }

        $task->delete();
        return redirect()->to('/')->withSuccess('Task deleted successfully');
    }
}
