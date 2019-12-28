<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FocusGoal extends Model
{
        
    protected $table = 'focus_goals';

    protected $keyType = 'integer';

    protected $fillable = ['focus_id', 'description', 'goal_weeks', 'spend_weeks'];

    public function focus()
    {
        return $this->belongsTo('App\Models\Focus');
    }    
}
