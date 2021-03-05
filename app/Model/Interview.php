<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use SoftDeletes;
    protected $table = 'interview_question';
    protected $fillable = ['id', 
                        'subject_type',
                        'title_url',
                        'title',
                        'description',
                        'deleted_at',
                        'created_at',
                        'updated_at'];

    
}
