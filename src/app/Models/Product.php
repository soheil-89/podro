<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        "user_id", "title", "description", "status"
    ];
    protected $appends = ['link'];

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->user_id = Auth::id();
        });

        static::addGlobalScope('product_user', function (Builder $builder) {
            $user = Auth::user();
            if ($user->user_type == "admin")
                $builder->where('user_id', $user->id);
            elseif ($user->user_type == "market")
                $builder->where('user_id', $user->parent);
        });

    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', "status"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    public function getLinkAttribute()
    {
        $user = Auth::user();
        //if ($user->user_type == "market") {
            $token = [
                    "u" => $user->id,
                    "p" => $this->id
                ];

            return route("market_view",  $token);
        //}
        return "";
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }
}
