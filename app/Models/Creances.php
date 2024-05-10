<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $patient_id
 * @property float $montant_tot
 * @property string $date
 * @property float $montant_res
 * @property float $montant_paye
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Creances extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['patient_id', 'montant_tot', 'date', 'montant_res', 'montant_paye', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'patient_id');
    }
}
