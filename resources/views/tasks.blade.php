@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">

                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}


                        <div class="form-group row">
                            <label for="task-name" class="col-sm-3 control-label col-form-label">Task</label>

                            <div class="col-sm-7">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}" required>
                            </div>
                        </div>
                 
                        <div class="form-group row">
                            <label for="task-description" class="col-sm-3 control-label col-form-label">Description</label>

                            <div class="col-sm-7">
                                <textarea name="description" id="task-description" class="form-control" value="{{ old('task') }}"></textarea> 
                            </div>
                        </div>

<!--                         <div class="form-group row">
                            <label for="task-assignee" class="col-sm-3 control-label col-form-label">Assignee</label>

                            <div class="col-sm-7">
                                <input type="text" name="assignee_id" id="task-assignee" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
!-->
                        <div class="form-group row">
                            <label for="task-assignee" class="col-sm-3 control-label col-form-label" >Assignee</label>
                            <div class="col-sm-7">
                              <select name="assignee_id" class="form-control" id="task-assignee" value="{{ old('task') }}">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                                           
                        <div class="form-group">
                            <div class="form-inline row">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <label class="sr-only" for="est-duration">Estimated duration</label>
                                    <input type="text" name="est_duration" id="est-duration" class="form-control mb-2 mr-sm-2 mb-sm-0" value="{{ old('task') }}" placeholder="Estimated duration" >
                                </div>
                            </div>
                       </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
         
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($intasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>Assignee</th>
                                <th>Owner</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($intasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('tasks/'.$task->id) }}">
                                                 {{ $task->name }}
                                                 </a>
                                            </div>
                                        </td>
                                        <td class="table-text">
                                            <a href="{{ url('users/'.$task->assignee->id) }}">
                                               {{ $task->assignee->name }}
                                            </a>
                                        </td>
                                       
                                       
                                        <td class="table-text">
                                           <a href="{{ url('users/'.$task->owner->id) }}">
                                                {{ $task->owner->name }} 
                                           </a>
                                        </td>
                                       
                                        <td>
                                            <button type="button" class="btn btn-default">
                                                <a href="{{ url('tasks/'.$task->id.'/edit') }}"> Edit</a>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-default">
                                                <a href="{{ url('tasks/complete/'.$task->id) }}"> Complete</a>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}


                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Completed Tasks -->
            @if (count($ctasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Completed Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>Duration</th>
                                <th>Estimated duration</th>
                                <th>Completed by</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($ctasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('tasks/'.$task->id) }}">
                                                 {{ $task->name }}
                                                 </a>
                                            </div>
                                        </td>

                                        <td class="table-text">
                                           {{ $task->act_duration }}
                                        </td>
                                        <td class="table-text">
                                           {{ $task->est_duration }}
                                        </td>
                                        <td class="table-text">
                                           {{ $task->assignee->name }}
                                        </td>
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}


                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
