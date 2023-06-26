<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
    protected $fillable = [
       'name'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function requests()
    {
        return $this->hasMany('App\Models\Requests', 'procedure_id', 'id');
    }

    public function questions(){
        return $this->belongsToMany(Questions::class,'question_procedures','procedure_id','question_id'); //best practice name relacinship report_user
    }

    public function questionProcedure()
    {
        return $this->hasMany('App\Models\QuestionProcedure', 'procedure_id', 'id');
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
