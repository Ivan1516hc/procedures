<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryRequest extends Model
{
    use HasFactory;
    protected $fillable = [
       'beneficiary_id','request_id'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function beneficiary()
    {
        return $this->hasOne('App\Models\Beneficiary', 'id', 'beneficiary_id');
    }
    
    public function request()
    {
        return $this->hasOne('App\Models\Requests', 'id', 'request_id');
    }
    
    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
