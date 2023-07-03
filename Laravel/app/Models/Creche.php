<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creche extends Model
{
    use HasFactory;
    protected $fillable = [
        'capacity','degree_id','room_id','center_id'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function degree()
    {
        return $this->hasOne('App\Models\Degree', 'id', 'degree_id');
    }

    public function center()
    {
        return $this->hasOne('App\Models\Center', 'id', 'center_id');
    }

    public function room()
    {
        return $this->hasOne('App\Models\Room', 'id', 'room_id');
    }

    public function procedure()
    {
        return $this->hasOne('App\Models\Procedure', 'id', 'procedure_id');
    }

    public function beneficiryCreche()
    {
        return $this->hasMany('App\Models\BeneficiaryCreche', 'creche_id', 'id');
    }

    public function beneficiaries(){
        return $this->belongsToMany(Beneficiary::class,'beneficiary_creches','creche_id','beneficiary_id'); //best practice name relacinship report_user
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
