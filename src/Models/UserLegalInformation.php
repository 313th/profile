<?php

namespace sahifedp\Profile\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $certificate_number
 * @property string $place_of_birth
 * @property string $place_of_issuance
 * @property string $birth_certificate_serial
 * @property string $religion
 * @property string $religion_branch
 * @property string $nationality
 * @property string $birth_date
 * @property string $address
 * @property string $postal_code
 * @property string $tel
 * @property string $image
 * @property string $meta
 * @property User $user
 */
class UserLegalInformation extends Model
{
    const USER_LEGAL_RELIGIONS = [
        "مسلمان" => [
            "شیعه","اهل سنت"
        ],
        "مسیحی" => [
            "آشوری","ارمنی"
        ],
        "کلیمی" => [
            "کلیمی"
        ],
        "زرتشتی" => [
            "زرتشتی"
        ],
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_legal_information';

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
    protected $fillable = ['id','created_at', 'updated_at', 'certificate_number', 'place_of_birth', 'place_of_issuance', 'birth_certificate_serial', 'religion', 'religion_branch', 'nationality', 'birth_date', 'address', 'postal_code', 'tel', 'image', 'meta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('sahifedp\Profile\Models\User', 'id');
    }
}
