<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $doctor_id
 * @property integer $ordonnance_id
 * @property string $date
 * @property string $motif
 * @property string $symptomes
 * @property string $diagnostic
 * @property string $heure_fin
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property User $user
 * @property Ordonnance $ordonnance
 */
class Consultations extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'doctor_id', 'ordonnance_id', 'date', 'motif', 'symptomes', 'diagnostic', 'heure_fin', 'created_at', 'updated_at'];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'doctor_id');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Consultation.php

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordonnance()
    {
        return $this->belongsTo(ordonnances::class);
    }

    // Consultation.php


    
}
