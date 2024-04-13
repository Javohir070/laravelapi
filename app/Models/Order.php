<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Order extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        "user_id",
        "comment",
        "sum",
        "delivery_method_id",
        "payment_type_id",
        "products",
        "address",
    ];
    
    protected $casts = ['address'=>'array','products'=>'array'];
    public $translatable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
    
    public function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class);
    }
}
