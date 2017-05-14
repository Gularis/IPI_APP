@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
		<div class="panel panel-default">
		    <div class="panel-heading">
		    	{{ $user->name }}'s  Owned tasks
		    </div>

		    <div class="panel-body">
		        <table class="table table-striped task-table">
		            <thead>
		                <th>Task Name</th>
		                <th>Task descripion</th>
		                <th>Estimated duration</th>
		                <th>&nbsp;</th>
		            </thead>
		            <tbody>
		                @foreach ($user->owned as $ownedTasks)
		                    <tr>
		                        <td class="table-text">
		                            <div>
		                                <a href="{{ url('tasks/'.$ownedTasks->id) }}">
		                                 {{ $ownedTasks->name }}
		                                 </a>
		                            </div>
		                        </td>
		                        <td class="table-text">
		                            <div>
		                                 {{ $ownedTasks->description }}
		                            </div>
		                        </td>
		                        <td class="table-text">
		                            <div>
		                                 {{ $ownedTasks->est_duration }}
		                            </div>
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		    </div>
		</div>

		<div class="panel panel-default">
		    <div class="panel-heading">
		    	{{ $user->name }}'s  Assigned tasks
		    </div>

		    <div class="panel-body">
		        <table class="table table-striped task-table">
		            <thead>
		                <th>Task Name</th>
		                <th>Task descripion</th>
		                <th>Estimated duration</th>
		                <th>&nbsp;</th>
		            </thead>
		            <tbody>
		                @foreach ($user->assigned as $assignedTasks)
		                    <tr>
		                        <td class="table-text">
		                            <div>
		                                <a href="{{ url('tasks/'.$assignedTasks->id) }}">
		                                 	{{ $assignedTasks->name }}
		                                 </a>
		                            </div>
		                        </td>
		                        <td class="table-text">
		                            <div>
		                                 {{ $assignedTasks->description }}
		                            </div>
		                        </td>
		                        <td class="table-text">
		                            <div>
		                                 {{ $assignedTasks->est_duration }}
		                            </div>
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
                <form method="get" action="{{ url('users') }}">
        			<button class="btn btn-default" type="submit">Back to users list</button>
		        </form>
		        <form method="get" action="{{ url('tasks') }}">
		            <button class="btn btn-default" type="submit">Back to tasks list</button>
		        </form>
		    </div>
		</div>


	</div>
</div>


@endsection