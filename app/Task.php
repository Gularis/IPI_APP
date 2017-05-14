<?php

namespace App;


class Task extends Model
{
    
	public function scopeIncomplete($query)
	{

		return $query->where('completed',0);

	}


	public function scopeCompleted($query)
	{

		return $query->where('completed',1);

	}

	public function owner()
	{

		return $this->belongsTo(User::class);

	}


	public function assignee()
	{

		return $this->belongsTo(User::class);

	}


}
