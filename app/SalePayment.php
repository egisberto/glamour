<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class SalePayment extends Model
{
    // use SoftDeletes;

    protected $table = 'sale_payment';
    protected $fillable = ['sale_id','payment_method_id','value','bandeira','description'];
    // protected $dates = ['deleted_at'];

    /**
     * Get the client from the sale
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the client from the sale
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
