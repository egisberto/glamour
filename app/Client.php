<?php

namespace App;

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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('age', function (Builder $builder) {
            $user = Auth::user();
            $builder->where('company_id', '=', $user->company_id);
        });
    }
}
