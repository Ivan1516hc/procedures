<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
       'question','descripcion'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function procedures(){
        return $this->belongsToMany(Procedure::class,'question_procedures','question_id','procedure_id'); //best practice name relacinship report_user
    }

    public function questionProcedure()
    {
        return $this->hasMany('App\Models\QuestionProcedure', 'question_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'question_id', 'id');
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
