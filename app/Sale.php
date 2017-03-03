<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';
    protected $fillable = ['client_id','value'];

    
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
