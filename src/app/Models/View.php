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
        "count","viewable_id","viewable_type","market_id"
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        "viewable_id","viewable_type"
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function market(){
        return $this->belongsTo(User::class);
    }

}
