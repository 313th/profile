<?php

namespace sahifedp\Profile\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Self_;
use sahifedp\Profile\Models\UserRelation;
use Spatie\Permission\Traits\HasRoles;
/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $username
 * @property string $display_name
 * @property string $mobile
 * @property string $mobile_verified_at
 * @property string $last_login
 * @property UserProfile $profile
 */

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasRoles, CanResetPassword;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'username', 'display_name', 'mobile', 'mobile_verified_at', 'last_login'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('sahifedp\Profile\Models\UserProfile', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function relations() {
        return $this->belongsToMany(User::class,'user_relations','from_user_id','to_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function parents() {
        return $this->belongsToMany(User::class,'user_relations','from_user_id','to_user_id')
            ->wherePivotIn('relation', [UserRelation::USER_RELATION_FATHER,UserRelation::USER_RELATION_MOTHER]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function fathers() {
        return $this->belongsToMany(User::class,'user_relations','from_user_id','to_user_id')
            ->wherePivot('relation', UserRelation::USER_RELATION_FATHER);
    }
    /**
     * @return User
     */
    public function getFatherAttribute() {
        return $this->fathers()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function mothers() {
        return $this->belongsToMany(User::class,'user_relations','from_user_id','to_user_id')
            ->wherePivot('relation', UserRelation::USER_RELATION_MOTHER);
    }
    /**
     * @return User
     */
    public function getMotherAttribute() {
        return $this->mothers()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function costodies() {
        return $this->belongsToMany(User::class,'user_relations','from_user_id','to_user_id')
            ->wherePivot('status', UserRelation::USER_RELATION_STATUS_COSTODY);
    }
    /**
     * @return User
     */
    public function getCostodyAttribute() {
        return $this->costodies()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function children() {
        return $this->belongsToMany(User::class,'user_relations','to_user_id','from_user_id')
            ->wherePivotIn('relation', [UserRelation::USER_RELATION_MOTHER,UserRelation::USER_RELATION_FATHER])
            ->orWhere(
                function($query){
                    $query->where('status','=',UserRelation::USER_RELATION_STATUS_COSTODY)
                        ->where('to_user_id',$this->id);
                }
            );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function legal() {
        return $this->hasOne(UserLegalInformation::class,'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employment() {
        return $this->hasOne(UserEmploymentInformation::class,'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function social() {
        return $this->hasOne(UserSocialInformation::class,'id');
    }
}
