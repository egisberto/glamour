<?php

namespace App;

use App\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Client extends Model
{
    protected $table = 'client';
    protected $guarded = ['id','company_id'];
    
    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setBirthDateAttribute($value)
    {
        if (empty($value)){
            return;
        }
        
        $this->attributes['birth_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
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
