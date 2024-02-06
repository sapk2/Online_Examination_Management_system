<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $gaurded=[];
    protected $fillable=['question','Question_type','marks','6',];
    public function subject(){
        return $this->belongsTo(subject::class);
    }


}
