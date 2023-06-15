<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','curp','nombre','apaterno','amaterno','fechanacimiento','edad','calle','numext','numint','escolaridad','primercruce','segundocruce','vivienda','municipio','codigopostal','colonia','celular','sexo','lenguamaterna','serviciosmedicos','hermanos_en_CDI','edades_hermanos','nombres_hermanos','tipo_sangre','enfermedad','enfermedad_otro','idcapturista','status'
    ];

    protected $casts = [
        'created_at'  => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:00',
    ];

    public function setAttribute($key, $value)
    {
        parent::setAttribute($key, $value);

        if (is_string($value))
            $this->attributes[$key] = trim(mb_strtoupper($value));
    }
}
