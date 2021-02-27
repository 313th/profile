<?php

namespace sahifedp\Profile\Models\;

use Illuminate\Database\Eloquent\Model;

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
 * @property UserProfile $userProfile
 */
class User extends Model
{
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
    public function userProfile()
    {
        return $this->hasOne('sahifedp\Profile\Models\\UserProfile', 'id');
    }
}
