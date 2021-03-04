<?php

namespace sahifedp\Profile\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $from_user_id
 * @property integer $to_user_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $relation
 * @property int $status
 * @property string $meta
 * @property User $from
 * @property User $to
 */
class UserRelation extends Model
{
    const USER_RELATION_FATHER = 1;
    const USER_RELATION_MOTHER = 2;
    const USER_RELATION_CHILD = 3;
    const USER_RELATION_PARENTAL_GRANDFATHER = 4;
    const USER_RELATION_PARENTAL_GRANDMOTHER = 5;
    const USER_RELATION_MATERNAL_GRANDFATHER = 6;
    const USER_RELATION_MATERNAL_GRANDMOTHER = 7;
    const USER_RELATION_PARENTAL_AUNT = 8;
    const USER_RELATION_PARENTAL_UNCLE = 9;
    const USER_RELATION_MATERNAL_AUNT = 10;
    const USER_RELATION_MATERNAL_UNCLE = 11;
    const USER_RELATION_BROTHER = 12;
    const USER_RELATION_SISTER = 13;
    const USER_RELATION_OTHER = 14;
    const RELATIONS = [
        self::USER_RELATION_FATHER => 'پدر',
        self::USER_RELATION_MOTHER => 'مادر',
        self::USER_RELATION_CHILD => 'فرزند',
        self::USER_RELATION_PARENTAL_GRANDFATHER => 'پدربزرگ/جد پدری',
        self::USER_RELATION_PARENTAL_GRANDMOTHER => 'مادربزرگ/جده پدری',
        self::USER_RELATION_MATERNAL_GRANDFATHER => 'پدربزرگ/جد مادری',
        self::USER_RELATION_MATERNAL_GRANDMOTHER => 'مادربزرگ/جده مادری',
        self::USER_RELATION_PARENTAL_AUNT => 'عمه',
        self::USER_RELATION_PARENTAL_UNCLE => 'عمو',
        self::USER_RELATION_MATERNAL_AUNT => 'خاله',
        self::USER_RELATION_MATERNAL_UNCLE => 'دایی',
        self::USER_RELATION_BROTHER => 'برادر',
        self::USER_RELATION_SISTER => 'خواهر',
        self::USER_RELATION_OTHER => 'دیگر',
    ];

    const USER_RELATION_STATUS_COSTODY = 1;
    const USER_RELATION_STATUS_PARENT = 2;
    const USER_RELATION_STATUS_DIVORCED = 3;
    const USER_RELATION_STATUS_DEAD = 4;
    const STATUSES = [
        self::USER_RELATION_STATUS_COSTODY => 'ساکن به عنوان ولی سرپرست',
        self::USER_RELATION_STATUS_PARENT => 'ساکن به عنوان ولی',
        self::USER_RELATION_STATUS_DIVORCED => 'جداشده/طلاق گرفته',
        self::USER_RELATION_STATUS_DEAD => 'فوت شده',
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
    protected $fillable = ['from_user_id', 'to_user_id', 'created_at', 'updated_at', 'relation', 'status', 'meta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from()
    {
        return $this->belongsTo('sahifedpProfileModels\User', 'from_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to()
    {
        return $this->belongsTo('sahifedpProfileModels\User', 'to_user_id');
    }

    public static function getRelationOf($from,$to){
        return UserRelation::where(['from_user_id'=>$from,'to_user_id'=>$to])->first();
    }

    public function getRelationTo($to){
        return self::getRelationOf($this->from,$to);
    }
}
