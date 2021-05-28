<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Image
 * @package App\Models
 */
class Image extends Model
{
    use SoftDeletes;
    /**
     * @var string[]
     */
    protected $fillable = [
        "url","imageable_id","imageable_type"
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        "imageable_id","imageable_type"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
