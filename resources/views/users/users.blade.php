@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
		<div class="panel panel-default">
		    <div class="panel-heading">
		        All users
		    </div>

		    <div class="panel-body">
		        <table class="table table-striped task-table">
		            <thead>
		                <th>Name</th>
		                <th>ID</th>
		                <th>Email</th>
		                <th>&nbsp;</th>
		            </thead>
		            <tbody>
		                @foreach ($users as $user)
		                    <tr>
		                        <td class="table-text">
		                                <a href="{{ url('users/'.$user->id) }}">
		                                 {{ $user->name }}
		                                 </a>
		                        </td>
		                        <td class="table-text">
		                                 {{ $user->id }}
		                        </td>
		                        <td class="table-text">
		                                 {{ $user->email }}
		                        </td>
		                        

		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		        <button type="button" class="btn btn-default">
	            	<a href="{{ url('tasks') }}"> back to tasks list</a>
	            </button>
		    </div>
		</div>
	</div>	
</div>



@endsection