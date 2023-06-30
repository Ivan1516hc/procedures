<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id','procedure_id','status','priority_id','center_id'
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

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote', 'request_id', 'id');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer', 'request_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function priority()
    {
        return $this->hasOne('App\Models\Priority', 'id', 'priority_id');
    }

    public function procedure()
    {
        return $this->hasOne('App\Models\Procedure', 'id', 'procedure_id');
    }
    public function center()
    {
        return $this->hasOne('App\Models\Center', 'id', 'center_id');
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
