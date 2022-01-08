@extends('layouts.app')

@section('content')

  

   
<div class="form-box">
    <form action='/tasks'method="POST">
        @csrf
        <h1>Create a task</h1>
    <div class="form-group" >
      <label for="title">Title</label>
      <input class="form-control" id="name" type="text" name="title">
    </div>
    <label for="deadline">Deadline</label>
    <div class='input-group date' id='datetimepicker'>
    
            <input type='text' class="form-control" name="deadline"/>
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="message" name="description"></textarea>
    </div>
    <input class="btn btn-primary" type="submit" value="Submit" />
    </div>
  </form>
</div>

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 
@endsection