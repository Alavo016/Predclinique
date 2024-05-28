<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $patient_id
 * @property integer $doctor_id
 * @property datetime $date
 * @property string $motif
 * @property string $statut
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property User $user
 */
class Rendez_vous extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rendez_vous';

    /**
     * @var array
     */
    protected $fillable = ['patient_id', 'doctor_id', 'date', 'motif', 'statut', 'created_at', 'updated_at'];

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
        return $this->belongsTo('App\Models\User', 'patient_id');
    }

    // Dans Rendez_vous.php (modèle)

public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id');
}

}
