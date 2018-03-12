<?php

namespace App;
use Cache;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'tb_province';
    protected $fillable = ['provincecode','namecn','countrycode','sort'];

    //文章类型缓存
    public static function fetchTypeNameAll(){
        $data = Cache::rememberForever('navs', function() {
            return self::all();
        });
		return $data;
    }
}
