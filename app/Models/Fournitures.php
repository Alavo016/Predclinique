<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $inf_id
 * @property integer $type_fourniture_id
 * @property string $nom
 * @property integer $quantite
 * @property integer $seuil_minimum
 * @property float $prix_unitaire
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property TypeFourniture $typeFourniture
 */
class Fournitures extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inf_id', 'type_fourniture_id', 'nom', 'quantite', 'seuil_minimum', 'prix_unitaire', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'inf_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeFourniture()
    {
        return $this->belongsTo('App\Models\TypeFourniture');
    }
}
