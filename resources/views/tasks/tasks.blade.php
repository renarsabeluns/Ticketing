@extends('layouts.app')

@section('content')
<h1 style = "text-align:center; padding-top:60px;">TASKS</h1>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <div> <span class="font-weight-bold project">Tasks</span> <small class="text-black-50 totals">{{$tasks->count('id')}} Total</small> </div> <a href="tasks/create"> <button class="btn btn-primary btn-sm">New Project</button></a>
    </div>
    <div class="bg-white border rounded mt-2">
      
    <div class="row mb-5">
        @foreach($tasks as $task)
        <div class="col-md-6 mt-3">
		
		<div class="bg-white p-3 rounded border">
                <h6>{{$task->title}} #{{$task->id}}</h6>
                <p class="text-black-50 content mb-5">{{$task->description}}</p>
                <div class="d-flex flex-row">
                    <div class="mr-4"> <span>Deadline</span>
                        <div class="mt-2"> <span class="text-black-50">{{$task->deadline}}</span> </div>
                    </div>
                </div>
            </div>
		
        </div>
        @endforeach
    </div>
</div>
@endsection