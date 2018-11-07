<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CE;

class RA extends Model
{
    protected $table = 'ra';

    public function ces()
    {
        return $this->hasMany('\App\CE', 'ra_id', 'id')->orderBy('pos');
    }

}
