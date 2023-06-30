<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','address','latitude','longitude'
     ];
 
     protected $casts = [
         'created_at'  => 'date:Y-m-d',
         'updated_at' => 'datetime:Y-m-d H:00',
     ];
 
     public function procedures(){
         return $this->belongsToMany(Procedure::class,'center_procedures','center_id','procedure_id');
     }
 
     public function requests()
     {
         return $this->hasMany('App\Models\Requests', 'center_id', 'id');
     }
 
     public function creches()
     {
         return $this->hasMany('App\Models\Creche', 'center_id', 'id');
     }

     public function users()
     {
         return $this->hasMany('App\Models\User', 'center_id', 'id');
     }
 
     public function setAttribute($key, $value)
     {
         parent::setAttribute($key, $value);
 
         if (is_string($value))
             $this->attributes[$key] = trim(mb_strtoupper($value));
     }
}
