<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_title',
        'exam_code',
        'duration',
        'start_at',
        'end_at',
        'numberof_question',
        'questiontype',
        'fullmark',
        'subject_id',
       
    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class); 
    }
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }

 }

