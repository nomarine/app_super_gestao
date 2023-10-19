<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    protected $table = 'produto_detalhes';
    protected $fillable = [
        'produto_id',
        'altura',
        'largura',
        'comprimento',
        'unidade_id'
    ];

    public function item(){
        return $this->belongsTo('App\Item', 'produto_id', 'id');
    }
}
