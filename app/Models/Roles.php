<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $libelle
 * @property string $created_at
 * @property string $updated_at
 * @property User[] $users
 */
class Roles extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['libelle', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'id_role');
    }
}
