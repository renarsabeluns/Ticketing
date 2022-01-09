<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks/tasks',
        ['tasks'=>$tasks]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',

        ]);

        $task = Task::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'deadline'=>$request->input('deadline'),
            'user_id'=>auth()->user()->id
        ]);
        return redirect('/tasks')->with('success', 'Task created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id)->first();
        return view('tasks.edit')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',

        ]);

        $task = Task::where('id',$id)
        ->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'deadline'=>$request->input('deadline'),
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/tasks')->with('success', 'Task updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id)->first();

        $task->delete();
        return redirect('/tasks');
    }
}
