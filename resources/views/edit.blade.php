@extends('layouts.app')

@section('content')

 <div class="col-sm-offset-2 col-sm-8">
         <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Task 
                    </div>

		<div class="panel-body">
		    @include('common.errors')

		    <form action="{{ url('tasks/'.$task->id) }}" method="POST" class="form-horizontal">
		        {{ csrf_field() }}
		        {{method_field('PATCH')}}

		        <div class="form-group row">
		            <label for="task-name" class="col-sm-3 control-label col-form-label">Task</label>

		            <div class="col-sm-7">
		                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}" placeholder="{{ $task->name }}" >
		            </div>
		        </div>
		 
		        <div class="form-group row">
		            <label for="task-description" class="col-sm-3 control-label col-form-label">Description</label>

		            <div class="col-sm-7">
		                <textarea name="description" id="task-description" class="form-control" value="{{ $task->description }}" placeholder="{{ $task->description }}"></textarea> 
		            </div>
		        </div>

		        <div class="form-group row">
	                <label for="task-assignee" class="col-sm-3 control-label col-form-label" >Assignee</label>
	                <div class="col-sm-7">
	                  <select name="assignee_id" class="form-control" id="task-assignee" value="{{ old('task') }}">
	                    @foreach ($users as $user)
	                    	@if ($user->id == $task->assignee->id)
	                    		<option selected="selected" value="{{ $user->id }}">{{ $user->name }}</option>
	                    	@else
	                        	<option value="{{ $user->id }}">{{ $user->name }}</option>
	                    	@endif
	                    @endforeach
	                  </select>
	                </div>
	            </div>


		        <div class="form-group row">
		            <label for="task-owner" class="col-sm-3 control-label col-form-label">Owner</label>

		            <div class="col-sm-7">
		                <input type="text" name="owner_id" id="task-owner" class="form-control" value="{{ $task->owner->id }}" placeholder="{{ $task->owner->name }}">
		            </div>
		        </div>

		        <div class="form-group row">
	                <label for="task-owner" class="col-sm-3 control-label col-form-label" >Owner</label>
	                <div class="col-sm-7">
	                  <select name="owner_id" class="form-control" id="task-owner" placeholder="{{ $task->owner->name }}" >
	                    @foreach ($users as $user)
	                        @if ($user->id == $task->owner->id)
	                    		<option selected="selected" value="{{ $user->id }}">{{ $user->name }}</option>
	                    	@else
	                        	<option value="{{ $user->id }}">{{ $user->name }}</option>
	                    	@endif
	                    @endforeach
	                  </select>
	                </div>
	            </div>


		        <div class="form-group">
		            <div class="col-sm-offset-3 col-sm-6">
		                <button type="submit" class="btn btn-default">
		                    <i class="fa fa-btn fa-plus"></i>Update Task
		                </button>
		            </div>
		        </div>

		    </form>
		</div>
		</div>
	</div>


@endsection