<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $episode_id
 * @property integer $user_id
 * @property string $hook
 * @property string $public_description
 * @property string $private_description
 * @property string $starts_at
 * @property string $created_at
 * @property string $updated_at
 */
class Session extends Model
{
    protected $table = 'session';

    protected $keyType = 'integer';

    protected $fillable = ['episode_id', 'user_id', 'hook', 'public_description', 'private_description', 'starts_at', 'created_at', 'updated_at'];

    public function episode()
    {
        return $this->belongsTo('App\Models\Episode');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
