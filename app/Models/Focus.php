<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Focus extends Model
{
        
    protected $table = 'focus';

    protected $keyType = 'integer';

    protected $fillable = ['chapter_id', 'name', 'description'];
    
    public function focusGoals()
    {
        return $this->hasMany('App\Models\FocusGoal');
    }
}
