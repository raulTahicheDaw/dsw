<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RA;

class CE extends Model
{
    protected $table = 'ce';

    public function ra()
    {
        return $this->belongsTo(RA::class, 'ce_id', 'id');
    }
}
