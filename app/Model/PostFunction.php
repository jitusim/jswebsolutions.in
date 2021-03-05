<?php

namespace App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class PostFunction extends Model
{
    use SoftDeletes;
    protected $table = 'post_function';
    protected $fillable = ['id', 
                        'subject_type',
                        'title_url',
                        'title',
                        'description',
                        'deleted_at',
                        'created_at',
                        'updated_at'];

}
