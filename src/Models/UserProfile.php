<?php

namespace sahifedp\Profile\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $family
 * @property string $nation_code
 * @property string $birth_date
 * @property string $address
 * @property string $postal_code
 * @property string $tel
 * @property string $image
 * @property string $meta
 * @property User $user
 */
class UserProfile extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id','created_at', 'updated_at', 'name', 'family', 'nation_code', 'birth_date', 'address', 'postal_code', 'tel', 'image', 'meta'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'datetime:Y-m-d',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('sahifedp\Profile\Models\User', 'id');
    }
}
