@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Task details 
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>{{$task->name}}</th>
                        <th></th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                       <b>Task Owner: </b> 
                            <a href="{{ url('users/'.$task->owner->id) }}" >
                                {{ $task->owner->name }}
                            </a>
                        <br>
                       <b>Task Assignee: </b> 
                            <a href="{{ url('users/'.$task->assignee->id) }}" >
                                {{ $task->assignee->name }}
                            </a>

                        @foreach ($attrs as $key => $value)
                            <tr>
                                <td class="table-text">
                                    <div>
                                        {{  $key }} 
                                    </div>
                                </td>
                                <td class="table-text">
                                   {{ $value }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (  $task->completed === 'true' )
                    <div style="visibility: hidden">
                @else
                    <div>
                @endif
                    <form method="get" action="{{ url('tasks/complete/'.$task->id) }}">
                        <button class="btn btn-primary" type="submit">Complete</button>
                    </form>
                </div>
                <form method="get" action="{{ url('tasks') }}">
                    <button class="btn btn-default" type="submit">Back to tasks list</button>
                </form>
                
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection
