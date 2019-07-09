<?php
namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Support\Facades\Input;
use Dingo\Api\Routing\Helpers;
use App\Transformers\RegionTransformer;

class RegionController extends Controller
{
    use Helpers;

    public function index(){
        $pid = Input::get('pid',0);
        $where = [];
        if(!$pid){
            $where['level'] = 1;
        }else{
            $where['pid'] = $pid;
        }
        $lists = Region::where($where)->get();
        return $this->response->collection($lists, new RegionTransformer());
    }
}