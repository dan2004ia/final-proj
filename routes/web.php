<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use PhpParser\Builder\Function_;
use function Pest\Laravel\post;  
 

Route::get('/about', function (): View {
    $name = 'dania';
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function (): View {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::get(uri: 'tasks' ,action: function(): View{
    $tasks = DB::table( 'tasks')->get();
    return view( 'tasks' , data: compact( 'tasks'));
});
Route::post(uri:'create', action:function (): mixed{
    $task_name =$_POST['name'];
    DB::table('tasks')->insert(  ['name'=> $task_name]);
    return redirect()->back();
});
Route::post('delete/{id}/', action: function($id){
    DB::table('tasks')->where('id', $id) ->delete();
    return redirect()->back();
});
 Route::post('edit/{id}',function($id){
    $task = DB::table('tasks')->where('id', $id) ->first();
    $tasks = DB::table('tasks')->get();
    return view( 'tasks' , data: compact( 'task','tasks'));
 });
Route::post('update', function ($id) {
    $id = $_POST['id'];
    DB::table('tasks')->where('id','=', $id)->update(['name' => $_POST['name'] ]);
    return  redirect( 'tasks');
  });
 
Route::get('tasks', function (): View {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

 Route::post('create', function () {
    $task_name = request()->input('name');
    DB::table('tasks')->insert(['name' => $task_name]);
    return redirect()->back();
});

 
Route::post('delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});
 
Route::post('edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});

 Route::post('update', function () {
    $id = request()->input('id');
    $name = request()->input('name');

    DB::table('tasks')->where('id', $id)->update(['name' => $name]);
    return redirect('tasks');
});
 