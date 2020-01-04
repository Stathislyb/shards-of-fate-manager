<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReputationItem extends Model
{
    protected $table = 'reputation_item';

    protected $keyType = 'integer';

    protected $fillable = ['player_id', 'name', 'description', 'reputation_cost'];

    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}
