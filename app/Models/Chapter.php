<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 */
class Chapter extends Model
{
    protected $table = 'chapter';

    protected $fillable = ['name', 'description'];

    public $timestamps = false; 

    public function episodes()
    {
        return $this->hasMany('App\Models\Episode');
    }

}
