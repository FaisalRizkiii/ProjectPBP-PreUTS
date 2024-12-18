<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'type';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'type',
        'status',];
}
