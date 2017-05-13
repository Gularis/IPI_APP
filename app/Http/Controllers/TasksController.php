<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;


class TasksController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth', ['except' => array('index', 'show') ]);
    }


	public function index()
	{
		$intasks = Task::incomplete()->orderBy('created_at', 'asc')->get();
		$ctasks = Task::completed()->orderBy('created_at', 'desc')->get();

		
	    return view('tasks',[
    	    'intasks' => $intasks,
    	    'ctasks' => $ctasks
        ]);


	}


	public function show(Task $task) /* Task::find(wildcard) */
	{
		
		$attrs = $task->getAttributes();

	    return view('task', compact('task','attrs'));

	}


	public function add(Request $request)
	{

	    $this->validate(request(), [
	    		'name' => 'required|max:255|min:5',
	    		'description' => 'required',
	    		'est_duration' => 'numeric'
	    	]);

	    $task = new Task;
	    $task->name = $request->name;
	    $task->description = $request->description;
	    $task->est_duration = $request->est_duration;
	    $task->assignee_id = $request->assignee_id;
	    $task->owner_id = auth()->id();
	    
	    $task->save();

	    return redirect('/tasks');
	}


	public function delete(Task $task)
	{
		$task->delete();

		return redirect('/tasks');
	}

	public function edit(Task $task)
	{

		return view('edit', compact('task'));
	}

	public function update(Request $request, Task $task)
	{
		
		
		/*$task->update($request->except('description'));*/

		if($request->has('name')){
			$task->name = $request->name; 			
		}
		if($request->has('description')){
			$task->description = $request->description; 			
		}
		if($request->has('assignee_id')){
			$task->assignee_id = $request->assignee_id; 			
		}
		if($request->has('owner_id')){
			$task->owner_id = $request->owner_id; 			
		}

 		$task->save();

		return redirect('/tasks'); //back();	
	}
	
	public function completeForm(Task $task)
	{
		return view('complete', compact('task'));

	} 
	public function complete(Request $request, Task $task)
	{
		$task->completed = $request->completed;
		$task->act_duration = $request->act_duration;
		$task->feedback = $request->feedback;

		$task->save();

		return redirect('/tasks');

	}


}
