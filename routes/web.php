<?php

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tasks');
});

Route::post('/task', function(Request $request){
    //驗證輸入
    $validator = Validator::make($request->all(), ['name'=>'required|max:255',]);
    if ($validator->fails()){
        return redirect('/')->withInput()->wuthErrors($validator);
    }

    //建立該任務...
    $task = new Task;
    $task->name = $request->name;
    $task->save();
    return reirect('/');
});

Route::delete('/task/{task}', function(Task $task){
    //
});
