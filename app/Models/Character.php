<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $player_id
 * @property string $name
 * @property string $race
 * @property string $class
 * @property string $level
 * @property string $unique_thing
 * @property string $focus
 * @property string $start_date
 * @property string $death_date
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 */
class Character extends Model
{
    protected $table = 'character';

    protected $keyType = 'integer';

    protected $fillable = ['player_id', 'name', 'race', 'class', 'level', 'unique_thing', 'focus', 'start_date', 'death_date', 'notes'];

    
    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }

}
