<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = [
       'visitor_id','procedure_id','status'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function beneficiaries(){
        return $this->belongsToMany(Beneficiary::class,'beneficiary_requests','request_id','beneficiary_id');
    }

    public function requestDocuments()
    {
        return $this->hasMany('App\Models\RequestDocument', 'request_id', 'id');
    }

    public function visitor()
    {
        return $this->hasOne('App\Models\Visitor', 'id', 'visitor_id');
    }

    public function procedure()
    {
        return $this->hasOne('App\Models\Procedure', 'id', 'procedure_id');
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
