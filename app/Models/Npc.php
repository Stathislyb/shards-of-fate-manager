<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $token
 * @property string $name
 * @property string $description
 * @property string $public_notes
 * @property string $private_notes
 * @property string $created_at
 * @property string $updated_at
 */
class Npc extends Model
{
    protected $table = 'npc';

    protected $keyType = 'integer';

    protected $fillable = ['token', 'name', 'description', 'public_notes', 'private_notes'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->token = (string) \Str::uuid();
        });
    }

}
