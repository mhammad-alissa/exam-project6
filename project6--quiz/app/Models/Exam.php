<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $primaryKey="post_id";
    protected $fillable = [
        'exam_id',
        'exam_name',
        'exam_description',
        'category_id',
        'created_at',
        'updated_at'
    ];
    public function exam()
    {
        return $this->belongsTo(Category::class);
    }
}


