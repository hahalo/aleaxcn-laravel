<?php

namespace App;
use Searchy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Domain extends Model
{
    //
    protected $table = 'tb_domain';
    protected $fillable = ['id','domain','name','comment','country','province','city','rank'];
    protected static $pageSize  = 100;
    protected static $current_page = 1;
    protected static $total;

    public static function fetchAll(){
        return self::orderBy('id', 'ASC')->paginate(100);
    }

    //Searchy搜索
    public static function allBySearch2($request){
        $s = $request->s;
        self::$current_page = $request->page?$request->page:1;
//        $query = "MATCH (domain,name,comment) AGAINST ('".$s."' IN NATURAL LANGUAGE MODE )";
//        $domains =  self::whereRaw($query)->paginate(100);
      //  $domains = Searchy::tb_domain('domain', 'name', 'comment')->query("'$s'")->get();
        //$domains = Searchy::tb_domain('domain', 'name', 'comment')->query("'$s'")->getQuery()->pagination;
         $items = Searchy::tb_domain('domain', 'name', 'comment')->query("'$s'")->get();
         self::$total = count($items);
         $domains = Searchy::tb_domain('domain', 'name', 'comment')->query("'$s'")
              ->getQuery()
              ->having('aggregate', '>', 10)
              ->skip(self::$current_page)
              ->take(self::$pageSize)
              ->get();
         $domains = self :: pagination($domains);
         return $domains;
    }

    //Like搜索
    public static function allBySearch($request){

        $s = $request->s;
        $domains = self::where('comment','like','%'.$s.'%')->paginate(100);
        return $domains;
    }

    //allbySearchProvince
    public static function allBySearchProvince($s){
        return self::where('province', $s)->paginate(100);
    }

    //模拟分页
    public static function pagination($items){
        $items = json_decode(json_encode($items), true);
        $item = array_slice($items, (self::$current_page-1)*self::$pageSize, self::$pageSize); //注释1
        $total = self::$total;
        $paginator =new LengthAwarePaginator($item, $total, self::$pageSize, self::$current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        //$items = $paginator->toArray()['data'];
        return $paginator;
    }

}
