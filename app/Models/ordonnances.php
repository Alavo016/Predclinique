<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $medicaments
 * @property string $posologie
 * @property string $dateDebut
 * @property string $dateFin
 * @property string $created_at
 * @property string $updated_at
 * @property Consultation[] $consultations
 */
class ordonnances extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['medicaments', 'posologie', 'dateDebut', 'dateFin', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany('App\Models\Consultation');
    }
}
