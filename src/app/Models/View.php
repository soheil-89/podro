<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Models
 */
class View extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        "count","viewable_id","viewable_type"
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        "viewable_id","viewable_type"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function viewable()
    {
        return $this->morphTo();
    }
}
