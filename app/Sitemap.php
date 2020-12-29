<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Sitemap extends Model{
	
   protected $table = 'sitemaps';
   protected $fillable = ['id','url','created_at' ,'updated_at'];
   
   public static function save_site_map($request){
      return Sitemap::create(['url'=>$request->url]);
   }
	
}
