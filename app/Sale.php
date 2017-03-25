<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sale extends Model
{
    protected $table = 'sale';
    protected $guarded = ['id','company_id'];
    
    /**
     * Get the client from the sale
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function setCompanyIdAttribute($value)
    {
        $user = Auth::user();
        $this->attributes['company_id'] = $user->company_id;
    }

    public function getCompanyIdAttribute($value)
    {
        $user = Auth::user();
        return $user->company_id;
    }
}