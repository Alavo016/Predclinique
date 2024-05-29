<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property integer $id
 * @property integer $id_role
 * @property integer $specialite_id
 * @property integer $dossier_medical_id
 * @property string $name
 * @property string $prenom
 * @property string $pseudo
 * @property string $email
 * @property string $telephone
 * @property string $sexe
 * @property string $nationalite
 * @property string $ville
 * @property string $photo
 * @property string $etat_civile
 * @property string $allergie
 * @property string $status
 * @property string $date_naissance
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Consultation[] $consultations
 * @property Consultation[] $consultations
 * @property Creance[] $creances
 * @property Disponibilite[] $disponibilites
 * @property Fourniture[] $fournitures
 * @property RendezVou[] $rendezVouses
 * @property RendezVou[] $rendezVouses
 * @property DossierMedical $dossierMedical
 * @property Specialite $specialite
 * @property Role $role
 */
class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var array
     */
    protected $fillable = ['id_role', 'specialite_id', 'dossier_medical_id', 'name', 'prenom', 'pseudo', 'email', 'telephone', 'sexe', 'nationalite', 'ville', 'photo', 'etat_civile', 'allergie', 'status', 'date_naissance', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function consultations()
    // {
    //     return $this->hasMany('App\Models\Consultations', 'doctor_id');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // User.php

    public function consultations()
    {
        return $this->hasMany(Consultations::class, 'doctor_id');
    }

    


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creances()
    {
        return $this->hasMany('App\Models\Creances');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disponibilites()
    {
        return $this->hasMany('App\Models\Disponibilites');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fournitures()
    {
        return $this->hasMany('App\Models\Fournitures');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function rendezVouses()
    // {
    //     return $this->hasMany('App\Models\RendezVou', 'doctor_id');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezVouses()
    {
        return $this->hasMany('App\Models\Rendez-vous');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dossierMedical()
    {
        return $this->belongsTo('App\Models\Dossier_medicals');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialite()
    {
        return $this->belongsTo('App\Models\Specialites');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Roles');
    }
    // User.php


    public function patientConsultations()
    {
        return $this->hasMany(Consultations::class, 'patient_id');
    }
}
