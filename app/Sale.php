<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sale extends Model
{
    protected $table = 'sale';
    protected $guarded = ['id','company_id'];
    
    /**
     * Get the client from the Sale
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope);

        static::creating(function ($model)
        {
            $user = Auth::user();
            $model->attributes['company_id'] = $user->company_id;
        });
    }
}