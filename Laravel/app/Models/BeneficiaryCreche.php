<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryCreche extends Model
{
    use HasFactory;
    protected $fillable = [
        'creche_id','beneficiary_id','status'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function beneficiary()
    {
        return $this->hasOne('App\Models\Beneficiary', 'id', 'beneficiary_id');
    }

    public function creche()
    {
        return $this->hasOne('App\Models\Creche', 'id', 'creche_id');
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
