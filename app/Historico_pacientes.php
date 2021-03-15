<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico_pacientes extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $dateFormat = 'd-m-Y H:i:s';

}
