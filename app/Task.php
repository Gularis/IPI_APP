<?php

namespace App;


class Task extends Model
{
    
	public function scopeIncomplete($query)
	{

		return $query->where('completed','false');

	}


	public function scopeCompleted($query)
	{

		return $query->where('completed','true');

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
