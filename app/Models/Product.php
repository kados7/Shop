<?php

namespace App\Models;

use App\Http\Controllers\app\PriceController;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory , Sluggable;
    protected $table = "products";
    protected $guarded = [] ;
    protected $appends = [ 'sale_check' , 'min_price_check'] ;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product_attributes(){
        return $this->hasMany(ProductAttribute::class);
    }

    public function product_variations(){
        return $this->hasMany(ProductVariation::class);
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function rates(){
        return $this->hasMany(ProductRate::class);
    }
    public function rates_avarage(){
        return $this->hasMany(ProductRate::class)->pluck('rate')->avg();
    }

    public function getIsActiveAttribute($is_active){
        return $is_active == 1 ? 'فعال' : 'غیرفعال';
    }

    public function hasProductQuantity(){
        return $this->product_variations()->where('quantity','!=', 0)->first() ?? null ;
    }

    public function getProductMinPriceVariation(){
        return PriceController::getProductMinPriceVariation($this->id);
    }

    public function getSaleCheckAttribute(){
        return $this->product_variations()
                            ->where('quantity','!=', 0)
                            ->where('sale_price','!=' , 0)
                            ->where('date_on_sale_from' , '<' , Carbon::now())
                            ->where('date_on_sale_to' , '>' , Carbon::now())
                            ->orderBy('sale_price')
                            ->first() ?? null ;
    }

    public function getMinPriceCheckAttribute(){
        return $this->product_variations()
                            ->where('quantity','!=', 0)
                            ->orderBy('price')
                            ->first() ?? null ;
    }

    public function userWishlistCheck($user_id){
        return $this->hasMany(Wishlist::class)->where('user_id', $user_id)->exists();
    }


    public function scopeFilter($query , $var_fil , $att_fils , $sort_fil) {
        if($var_fil){
            $query->whereHas('product_variations', function($query) use($var_fil){
                $query->whereIn('value' , $var_fil );

                }
            );
        }
        // dd($att_fils);
        if($att_fils){
            $query->whereHas('product_attributes', function($query) use($att_fils){
                $query->whereIn('value' , $att_fils );

                }
            );
        }

        if($sort_fil){
            switch ($sort_fil) {
                case 'latest':
                    $query->orderByDesc('updated_at');
                    break;
                case 'oldest':
                    $query->orderBy('updated_at');
                    break;
                case 'max_price':
                    $query->orderByDesc(
                        ProductVariation::select('price')->whereColumn('product_variations.product_id','products.id')
                            ->orderByDesc('sale_price')->take(1)
                    );
                    break;
                case 'min_price':
                    $query->orderBy(
                        ProductVariation::select('price')->whereColumn('product_variations.product_id','products.id')
                            ->orderByDesc('sale_price')->take(1)
                    );
                    break;
                }
        }
    }
    public function scopeSearch($query , $search_term){
        if($search_term and trim($search_term) != ''){
            $query->where('name', 'LiKE', '%'.trim($search_term).'%' );
        }

        return $query;
    }


}
