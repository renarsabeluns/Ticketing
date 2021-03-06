@extends('layouts.app')

@section('content')




<div class="form-box">
  <form action='/tasks/{{$task->id}}' method="POST">
    @csrf
    @method('PUT')
    <h1>Edit a task</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div><br />
    @endif
    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" id="name" type="text" name="title" value="{{$task->title}}" required>
    </div>
    <label for="deadline">Deadline</label>
    <div class='input-group date' id='datetimepicker'>

      <input type='text' class="form-control" name="deadline" value="{{$task->deadline}}" required />
      <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="message" name="description" required>{{$task->description}}</textarea>
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