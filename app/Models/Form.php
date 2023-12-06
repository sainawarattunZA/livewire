<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory,HasUlids;

    protected $casts = [
        'content' => 'array',
    ];

    public function form(){
        return $this->belongsTo(FormTemplate::class);
    }

}
