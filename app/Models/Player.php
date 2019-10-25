<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $token
 * @property string $name
 * @property int $reputation
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 */
class Player extends Model
{
    protected $table = 'player';

    protected $keyType = 'integer';

    protected $fillable = ['token', 'name', 'reputation', 'notes', 'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->token = (string) \Str::uuid();
        });
    }

    public function sessions()
    {
        return $this->belongsToMany('App\Models\Session', 'player_session', 'player_id', 'session_id')
            ->as('subscription')
            ->withPivot('verified')
            ->withTimestamps();
    }

    public function characters()
    {
        return $this->hasMany('App\Models\Character');
    }
}
