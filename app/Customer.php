<?php

namespace App;

use Illuminate\Validation\Rule;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model implements HasMedia
{
    use SoftDeletes, LogsActivity, HasMediaTrait;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Validation rules
     *
     * @param int $customerId
     * @return array
     **/
    public static function validationRules($customerId = null)
    {
        $uniqueRule = Rule::unique('customers');

        if ($customerId) {
            $uniqueRule->ignore($customerId);
        }

        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => [
                'required',
                'email',
                $uniqueRule
            ],
            'phone_number' => 'required|string',
            'password' => 'required|string|confirmed',
        ];
    }

    /**
     * Get the posts for the Customer.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }
}
