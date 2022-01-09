@extends('layouts.app')

@section('content')

  

   
<div class="form-box">
    <form action='/tasks'method="POST">
        @csrf
        <h1>Create a task</h1>
    <div class="form-group" >
      <label for="title">Title</label>
      <input class="form-control" id="name" type="text" name="title" required>
    </div>
    <label for="deadline">Deadline</label>
    <div class='input-group date' id='datetimepicker'>
    
            <input type='text' class="form-control" name="deadline" required/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="message" name="description" required></textarea>
    </div>
    <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
  </form>
</div>


@endsection