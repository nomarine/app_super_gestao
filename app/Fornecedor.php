<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $fillable = [
        'nome', 
        'site', 
        'uf', 
        'email'
    ];

    protected $table = 'fornecedores';
}
