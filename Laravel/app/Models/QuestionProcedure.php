<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionProcedure extends Model
{
    use HasFactory;
    protected $fillable = [
       'question_id','procedure_id'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
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
