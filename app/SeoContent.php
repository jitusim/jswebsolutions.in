<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class SeoContent extends Model{
   
       protected $table = 'seo_content_tbl';
	   protected $fillable = ['id','page_url','page_title','meta_key_word', 'meta_description','created_at','updated_at'];
	   
	   
	  
	  
}
