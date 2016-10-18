<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admin\Menu;
use App\Models\Admin\Tree;
class MenuController extends Controller
{
    protected $menu = null;
    protected $tree = null;
    public function __construct()
    {
        $this->menu = new Menu();
        $this->tree = new Tree();
    }

    public function store(Request $request){
        $input = $request->all();
        return $input;
    }
    /**
     *  显示菜单
     */
    public function index()
    {
        $result = $this->menu->info();
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $newmenus=array();
        foreach ($result as $m){
            $newmenus[$m['id']]=$m;

        }
        foreach ($result as $n=> $r) {

            $result[$n]['level'] = $this->_get_level($r['id'], $newmenus);
            $result[$n]['parentid_node'] = ($r['parentid']) ? ' class="child-of-node-' . $r['parentid'] . '"' : '';

            $result[$n]['str_manage'] = '<a href="/Admin/Menu/add/'.$r["id"].'">添加子菜单</a> | <a target="_blank" href="/Admin/Menu/edit/'.$r["id"].'">修改</a> | <a class="J_ajax_del" href="/Admin/Menu/delete/'.$r["id"].'">删除</a> ';
            $result[$n]['status'] = $r['status'] ? "显示" : "隐藏";
            $result[$n]['app']=$r['app']."/".$r['model']."/".$r['action'];
        }
        $this->tree->init($result);
        $str = "<tr id='node-\$id' \$parentid_node>
					<td style='padding-left:20px;'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input input-order'></td>
					<td>\$id</td>
        			<td>\$app</td>
					<td>\$spacer\$name</td>
				    <td>\$status</td>
					<td>\$str_manage</td>
				</tr>";

        $categorys = $this->tree->get_tree(0, $str);
        return view('Admin.Menu.index')->with('array',$categorys);
    }



    //添加后台菜单
    public function add($parentid)
    {
        $tree = new tree();
        $result = $this->menu->info();
        foreach ($result as $r) {
            $r['selected'] = $r['id'] == $parentid ? 'selected' : '';
            $array[] = $r;
        }
        $str = "<option value='\$id' \$selected>\$spacer \$name</option>";
        $tree->init($array);
        $select_categorys = $tree->get_tree(0, $str);
        return view('Admin.Menu.add')->with('array',$select_categorys);
    }

    public function addPost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique|max:255',
            'body' => 'required',
        ]);
        //$name = $result->input('model');
        var_dump($request->all());var_dump($_POST['model']);exit;
        if ($Request->isMethod('post')) {
            var_dump($Request->input('model'));exit;
            Menu::create($Request::all());
        }
    }
    /**
     * 获取菜单深度
     * @param $id
     * @param $array
     * @param $i
     */
    protected function _get_level($id, $array = array(), $i = 0) {

        if ($array[$id]['parentid']==0 || empty($array[$array[$id]['parentid']]) || $array[$id]['parentid']==$id){
            return  $i;
        }else{
            $i++;
            return $this->_get_level($array[$id]['parentid'],$array,$i);
        }

    }


    public function getTree($cate,$pid=0,$level=0,$html='--'){
    $tree = array();
    foreach($cate as $v){
        if($v['parentid'] == $pid){
            $v['level'] = $level + 1;
            $v['html'] = str_repeat($html, $level);
            $tree[] = $v;
            $tree = array_merge($tree, self::getTree($cate,$v['id'],$level+1,$html));
        }
    }
    return $tree;
}
}
