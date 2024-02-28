<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'code',
        'subject_name',
        'description',
        'credit_hrs',
        'faculties_id'
    ];
    
}
