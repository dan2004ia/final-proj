<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('tasks'));
    }

    public function create()
    {
        $task_name = $_POST['name'];
        DB::table('tasks')->insert(['name' => $task_name]);
        return redirect()->back();
    }
    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', data: compact('task', 'tasks'));
    }
    public function update()
    {
        $id = $_POST['id'];
        DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']]);
        return redirect('tasks');
    }
}

