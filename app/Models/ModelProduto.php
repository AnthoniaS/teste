<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProduto extends Model
{
    protected $table= 'produto';
    protected $fillable=['title','id_user','pages','price'];

    public function relUsers()
    {
        return $this->hasOne( 'App\User',  'id', 'id_user');
    }
}
