<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $gp_sanguin
 * @property string $poids
 * @property string $taille
 * @property string $created_at
 * @property string $updated_at
 * @property User[] $users
 */
class Dossier_medicals extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['gp_sanguin', 'poids', 'taille', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
