<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $doctor_id
 * @property string $jour
 * @property string $heure_debut
 * @property string $heure_fin
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Disponibilites extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['doctor_id', 'jour', 'heure_debut', 'heure_fin', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'doctor_id');
    }
}
