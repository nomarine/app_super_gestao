<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    //
    protected $fillable = 
    [
        'nome', 
        'mensagem', 
        'email', 
        'motivos_contato_id',
        'telefone'
    ];
}
