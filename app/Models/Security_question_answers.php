<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class security_question_answers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'answer_1',
        'answer_2',
        'answer_3'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
