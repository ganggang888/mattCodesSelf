<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class Menu extends Model
{
    public $table = 'menu';
    protected $fillable = [
        'app',
        'model',
        'action',
        'name'
    ];
    public $timestamps = false;

    /**
     * 菜单树状结构集合
     */
    public function createTree($array,$parentid=0)
    {
        $result = array();
        foreach($array as $key => $val){
            if($val['parentid'] == $parentid) {
            $tmp = $array[$key];unset($array[$key]);
            count(self::createTree($array,$val['id'])) > 0 && $tmp['children'] = self::createTree($array,$val['id']);
            $result[$key] = $tmp;
            }
        }
        return $result;
    }


    //保存菜单信息
    public function saveInfo($array)
    {

    }
    //返回无限极分类数组
    public function AllInfo()
    {
        $all = DB::select("SELECT * FROM menu WHERE status = ?",[1]);
        foreach ($all as $vo) {
            $data[] = get_object_vars($vo);
        }
        $all = $this->createTree($data);
        return $all;
    }



    //返回所有信息
    public function info()
    {
        $all = DB::select("SELECT * FROM menu ");
        foreach ($all as $vo) {
            $data[] = get_object_vars($vo);
        }
        return $data;
    }


    public function returns()
    {
        $array = [
            [
                'certifiedTime'=>'', //获得证书时间
                'id'=>'', //id
                'evaluate'=>'',  //总体评价
                'children'=>[
                    [
                        'assess'=>'',//评价
                        'id'=>'', //id
                        'photos'=>'',//上传的照片
                        'display'=>'',//作品展示
                        'score'=>''//成绩
                    ],
                ],
            ],
            [
                'certifiedTime'=>'', //获得证书时间
                'id'=>'',//id
                'evaluate'=>'',  //总体评价
                'children'=>[
                    [
                        'assess'=>'',//评价
                        'id'=>'',
                        'photos'=>'',//上传的照片
                        'display'=>'',//作品展示
                        'score'=>''//成绩
                    ],
                    [
                        'assess'=>'',//评价
                        'id'=>'',
                        'photos'=>'',//上传的照片
                        'display'=>'',//作品展示
                        'score'=>''//成绩
                    ],
                ],
            ],
        ];
    }
    //生成后台菜单所需要的html
    public function toMenu()
    {
        /*//先获取无限极分类的数组
        $info = $this->AllInfo();

        $html = "";
        //最多三级
        foreach ($info as $key=>$vo) {
            $url = "/".$vo['app']."/".$vo['model']."/".$vo['action'];
            $html .= "<li>";
            if (empty($vo['children'])) {

                $html .= '<a href=\'javascript:openapp("'.$url.'","'.$vo["id"].'","'.$vo["name"].'");\'>
                                <i class="fa fa-'.$vo["icon"].'"></i>
                                <span class="menu-text">'.$vo["name"].'</span>
                            </a>';
            } else {
                $html .= '<a href="#" class="dropdown-toggle">
                                <i class="fa fa-'.$vo["icon"].' normal"></i>
                                <span class="menu-text normal">'.$vo["name"].'</span>
                                <b class="arrow fa fa-angle-right normal"></b>
                                <i class="fa fa-reply back"></i>
                                <span class="menu-text back">返回</span>
                                
                            </a>
                            <ul  class="submenu">';
                            foreach ($vo['children'] as $key=>$vo) {
                                $html .= "<li>";
                                if (empty($vo['children'])) {
                                    $html .= '<a href=\'javascript:openapp("'.$url.'","'.$vo["id"].'","'.$vo["name"].'");\'>
                                <i class="fa fa-'.$vo["icon"].'"></i>
                                <span class="menu-text">'.$vo["name"].'</span>
                            </a>';
                                } else {
                                    $html .= '<a href="#" class="dropdown-toggle">
                                <i class="fa fa-'.$vo["icon"].' normal"></i>
                                <span class="menu-text">'.$vo["name"].'</span>
                                <b class="arrow fa fa-angle-right"></b>
                            </a><ul  class="submenu">';

                                foreach ($vo['children'] as $vo) {
                                    $html .= '<li>
                        <a href=\'javascript:openapp("'.$url.'","'.$vo["id"].'","'.$vo["name"].'");\'>
                                &nbsp;<i class="fa fa-'.$vo["icon"].'"></i>
                                <span class="menu-text">'.$vo["name"].'</span>
                            </a>
                    </li>';
                                }
                                
                                }
                                $html .= "</li>";

                            }
                            $html .= '</ul>';
            }
            $html .= "</li>";
        }
        return $html;*/
    }
}
