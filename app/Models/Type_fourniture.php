<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nom
 * @property string $created_at
 * @property string $updated_at
 * @property Fourniture[] $fournitures
 */
class Type_fourniture extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'type_fourniture';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fournitures()
    {
        return $this->hasMany('App\Models\Fourniture');
    }
}
