@extends('layouts.app')

@section('content')

	<div class="col-sm-offset-2 col-sm-8">
         <div class="panel panel-default">
                    <div class="panel-heading">
                       Complete {{$task->name}}
                    </div>

		<div class="panel-body">
		    @include('common.errors')

		    <form action="{{ url('tasks/complete/'.$task->id) }}" method="POST" class="form-horizontal">
		        {{ csrf_field() }}
		        {{method_field('PATCH')}}

		        <div class="form-group row">
		            <label for="task-duration" class="col-sm-3 control-label col-form-label">Actual Duration</label>

		            <div class="col-sm-7">
		                <input type="text" name="act_duration" id="task-duration" class="form-control" placeholder="{{ $task->est_duration }}" required>
		            </div>
		        </div>
		 
		        <div class="form-group row">
		            <label for="task-feedback" class="col-sm-3 control-label col-form-label">Feedback</label>

		            <div class="col-sm-7">
		                <textarea name="feedback" id="task-feedback" class="form-control" ></textarea> 
		            </div>
		        </div>
		        <input type="hidden" name="completed" value="true">

		        <div class="form-group">
		            <div class="col-sm-offset-3 col-sm-6">
		                <button type="submit" class="btn btn-primary">
		                    Complete Task
		                </button>
		            </div>
		        </div>

		    </form>
		</div>
		</div>
	</div>


@endsection