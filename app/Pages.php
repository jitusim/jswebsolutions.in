<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model{
   
       protected $table = 'page';
	   protected $fillable = ['id','page_slug','page_name' , 'priority' , 'status' , 'meta_key_word' , 'meta_description','deleted_at','created_at','updated_at'];
	  
}
