@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
                <button type="button" class="btn btn-default">
                    <a href="{{ url('tasks') }}"> back to tasks list</a>
                </button>
        </div>
    </div>
</div>
@endsection