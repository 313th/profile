<?php

namespace sahifedp\Profile\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $health_status
 * @property string $diseases
 * @property boolean $left_handed
 * @property boolean $devotion_status
 * @property string $devotion
 * @property boolean $charity_status
 * @property string $charity
 * @property string $meta
 * @property User $user
 */
class UserSocialInformation extends Model
{
    const USER_SOCIAL_SICKNESS_NO = 0;
    const USER_SOCIAL_SICKNESS_SPECIAL = 1;
    const USER_SOCIAL_SICKNESS_DISABILITY = 2;
    const USER_SOCIAL_DISEASES = [
        self::USER_SOCIAL_SICKNESS_NO => 'سالم',
        self::USER_SOCIAL_SICKNESS_SPECIAL => 'دارای بیماری خاص',
        self::USER_SOCIAL_SICKNESS_DISABILITY => 'دارای معلولیت',
    ];

    const USER_SOCIAL_RIGHT_HANDED = 0;
    const USER_SOCIAL_LEFT_HANDED = 1;
    const USER_SOCIAL_HAND_DIRECTION = [
        self::USER_SOCIAL_RIGHT_HANDED => 'چپ دست نیستم',
        self::USER_SOCIAL_LEFT_HANDED => 'چپ دست هستم',
    ];

    const USER_SOCIAL_DEVOTION_NO = 0;
    const USER_SOCIAL_DEVOTION_MARTYR = 1;
    const USER_SOCIAL_DEVOTION_INJURED = 2;
    const USER_SOCIAL_DEVOTION_CAPTURED = 3;
    const USER_SOCIAL_DEVOTION_FIGHTER = 4;
    const USER_SOCIAL_DEVOTIONS = [
        self::USER_SOCIAL_DEVOTION_NO => 'نیستم',
        self::USER_SOCIAL_DEVOTION_MARTYR => 'فرزند شهید',
        self::USER_SOCIAL_DEVOTION_INJURED => 'فرزند جانباز',
        self::USER_SOCIAL_DEVOTION_CAPTURED => 'فرزند آزاده',
        self::USER_SOCIAL_DEVOTION_FIGHTER => 'فرزند رزمنده',
    ];

    const USER_SOCIAL_CHARITY_NO = 0;
    const USER_SOCIAL_CHARITY_YES = 1;
    const USER_SOCIAL_CHARITIES = [
        self::USER_SOCIAL_CHARITY_NO => 'نیستم',
        self::USER_SOCIAL_CHARITY_YES => 'هستم',
    ];



    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_social_information';

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
    protected $fillable = ['id','created_at', 'updated_at', 'health_status', 'diseases', 'left_handed', 'devotion_status', 'devotion', 'charity_status', 'charity', 'meta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('sahifedp\Profile\Models\User', 'id');
    }
}
