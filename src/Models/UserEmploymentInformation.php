<?php

namespace sahifedp\Profile\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $job
 * @property int $education
 * @property string $field_of_study
 * @property string $personnel_id
 * @property User $user
 */
class UserEmploymentInformation extends Model
{
    const USER_EDUCATION_UNDER_DIPLOMA = 1;
    const USER_EDUCATION_DIPLOMA = 2;
    const USER_EDUCATION_ASSOCIATE_DEGREE = 3;
    const USER_EDUCATION_BACHELOR = 4;
    const USER_EDUCATION_MASTER = 5;
    const USER_EDUCATION_PHD = 6;
    const USER_EDUCATION_PPHD = 7;
    const USER_EDUCATIONS = [
        self::USER_EDUCATION_UNDER_DIPLOMA => 'زیر دیپلم',
        self::USER_EDUCATION_DIPLOMA => 'دیپلم / سطح مقدمات حوزه علمیه',
        self::USER_EDUCATION_ASSOCIATE_DEGREE => 'فوق دیپلم / سطح یک حوزه علمیه',
        self::USER_EDUCATION_BACHELOR => 'کارشناسی / سطح دو حوزه علمیه',
        self::USER_EDUCATION_MASTER => 'کارشناسی ارشد / سطح سه حوزه علمیه',
        self::USER_EDUCATION_PHD => 'دکتری / سطح چهار حوزه علمیه',
        self::USER_EDUCATION_PPHD => 'فوق دکتری / سطح خارج حوزه و بالاتر',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_employment_information';

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
    protected $fillable = ['id','created_at', 'updated_at', 'job', 'education', 'field_of_study', 'personnel_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('sahifedp\Profile\Models\User', 'id');
    }
}
