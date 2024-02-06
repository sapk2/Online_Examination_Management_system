<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamNotices extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'exam_date',
        'faculties_id'
    ];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
}
