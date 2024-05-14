<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $patient_id
 * @property float $montant_
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Prix extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'prix_rdv';

    /**
     * @var array
     */
    protected $fillable = ['patient_id', 'montant_', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'patient_id');
    }
}
