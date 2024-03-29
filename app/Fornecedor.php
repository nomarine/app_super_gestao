<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'nome', 
        'site', 
        'uf', 
        'email'
    ];

    protected $table = 'fornecedores';

    public function produtos(){
        return $this->hasMany('App\Produto', 'fornecedor_id', 'id');
    }
}
