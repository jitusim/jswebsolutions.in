<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model {
     
    use SoftDeletes;
    protected $table = 'page';
    protected $fillable = ['id',
                        'page_slug', 
                        'page_name', 
                        'priority', 
                        'status',
                        'meta_key_word',
                        'meta_description',
                        'deleted_at',
                        'created_at',
                        'updated_at'];

}
