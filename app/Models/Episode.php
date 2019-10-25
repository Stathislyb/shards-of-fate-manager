<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $chapter_id
 * @property string $name
 * @property string $description
 */
class Episode extends Model
{
    protected $table = 'episode';

    protected $keyType = 'integer';

    protected $fillable = ['chapter_id', 'name', 'description'];

    public $timestamps = false; 

    public function chapter()
    {
        return $this->belongsTo('App\Models\Chapter');
    }

    public function sessions()
    {
        return $this->hasMany('App\Models\Session');
    }
}
