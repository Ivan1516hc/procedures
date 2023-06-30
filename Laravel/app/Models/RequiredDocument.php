<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    use HasFactory;
    protected $fillable = [
       'procedure_id','document_type_id','forced'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function procedure()
    {
        return $this->hasOne('App\Models\Procedure', 'id', 'procedure_id');
    }
    
    public function documentType()
    {
        return $this->hasOne('App\Models\Document_type', 'id', 'document_type_id');
    }

    public function requestDocuments()
    {
        return $this->hasMany('App\Models\RequestDocument', 'required_document_id', 'id');
    }

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
