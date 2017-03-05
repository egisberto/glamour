<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';
    protected $guarded = ['id'];

    
    /**
     * Get the client from the sale
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function payments() {
    	return $this->hasMany(SalePayment::class);	
    }
}
