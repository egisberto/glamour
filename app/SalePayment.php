<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    // use SoftDeletes;

    protected $table = 'sale_payment';
    protected $fillable = ['sale_id','payment_method_id','value','bandeira','description'];

    /**
     * Get the Payment Method used on Sale
     */
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the Sale
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
