<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = [
        'produto_id',
        'altura',
        'largura',
        'comprimento',
        'unidade_id'
    ];

    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
