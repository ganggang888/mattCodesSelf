<?php
/**
 * Created by PhpStorm.
 * User: liu
 * Date: 2015/9/7
 * Time: 10:35
 * 学生详细信息录入
 */

namespace Admin\Controller;
use Common\Controller\AdminbaseController;
use Think\Page;


class SdtmainController extends AdminbaseController
{
    protected $sdtModel;  //student_main
    protected $certiModel;//certificate
    protected $workModel;//student_work
    protected $sdt_certiModel;//student_certificate
    protected $sdt_result;//student_result
    protected $info;//info
    protected $education = array(0=>'未填',1=>'小学',2=>'初中',3=>'高中(中专)',4=>'专科',5=>'本科');
    protected $constellation = array(0=>'未填',1=>'白羊座',2=>'金牛座',3=>'双子座',4=>'巨蟹座',5=>'狮子座',6=>'处女座',7=>'天秤座',8=>'天蝎座',9=>'射手座',10=>'摩羯座',11=>'水瓶座',12=>'双鱼座');
    protected $zodiac = array(0=>'未填',1=>'鼠',2=>'牛',3=>'虎',4=>'兔',5=>'龙',6=>'蛇',7=>'马',8=>'羊',9=>'猴',10=>'鸡',11=>'狗',12=>'猪');
    protected $blood = array(0=>'未知',1=>'A型',2=>'B型',3=>'O型',4=>'AB型',5=>'其它');
    protected $marriage = array(0=>'已婚',1=>'未婚',2=>'离异');
    protected $language = array(0=>'听',1=>'说',2=>'读');
    function _initialize(){
        $this->sdtModel = D('StudentMain');
        $this->certiModel = D('Certificate');
        $this->workModel = D('StudentWork');
        $this->sdt_certiModel = D('StudentCertificate');
        $this->sdt_result = D('StudentResult');
        $this->info = D('Info');

    }
    function index(){
        if(IS_POST){
            $name = I('post.name');
            if(!empty($name)){
                $search['name'] = $name;
                $where = array();
                $where['name'] = array("like","%$name%");
                $where['is_delete'] = 0;
                $Page = get_page( $this->sdtModel,$where,10 );
                $students = $this->sdtModel->where($where)->select();
                $this->assign('search',$search);
            }else{
                $Page = get_page( $this->sdtModel,'is_delete = 0',10 );
                $students = $this->get_student();
            }
        }else{
            $Page = get_page( $this->sdtModel,'is_delete = 0',10 );
            $students = $this->get_student();
        }


        //$students = $this->sdtModel->where('is_delete = 0' )->select();
        foreach($students as $key=>$vo){
            $id = $vo['id'];
            $work = $this->get_work($id);
            $students[$key]['work'] = $work;

        }
        //var_dump($students);exit;
        $this->assign('Page',$Page->show());
        $this->assign('students',$students);
        $this->display();

    }
    function add(){

        $certificate = $this->certiModel->where('is_delete = 0')->select();
        $this->assign('education',$this->education);
        $this->assign('constellation',$this->constellation);
        $this->assign('zodiac',$this->zodiac);
        $this->assign('blood',$this->blood);
        $this->assign('marriage',$this->marriage);
        $this->assign('language',$this->language);
        $this->assign('certificate',$certificate);
        $this->display();
    }
    function add_post(){
        if(IS_POST){
            $post = I('post.post');
            $contact = I('post.contact');
            $certificate = I('post.certificate');
            $family['father'] = I('post.father');
            $family['mother'] = I('post.mother');
            $family['mate'] = I('post.mate');
            $family['child'][0] = I('post.child1');
            $family['child'][1] = I('post.child2');
            //$family['child'] = array($child1,$child2);
            $introduce = I('post.introduce');

            $post['em_contact'] = json_encode($contact);
            $post['family'] = json_encode($family);
            $post['introduce'] = json_encode($introduce);
            //var_dump($post['birthday']);exit;
            //事务处理
            $sdtModel = $this->sdtModel;
            $sdtModel->startTrans();
            if(!$sdtModel->create($post)){
                $this->error($sdtModel->getError());
            }
            $result = $sdtModel->add($post);
            //证书表添加
            if($result){
                if(!empty($certificate)){
                    $data['student_id'] = $result;
                    $is_o = true;
                    $sdt_cer = array();
                    foreach($certificate as $vo){
                        $data['certificate_id'] = $vo;
                        $certificate_result = $this->sdt_certiModel->add($data);
                        $cer_info = $this->certiModel->where("id = $vo")->find();
                        $sdt_cer[$vo] = $cer_info['title'];

                        if(!$certificate_result){
                            $is_o = false;
                            $sdtModel->rollback();
                            //
                        }
                    }
                    $update['certificate'] = json_encode($sdt_cer);
                    $result_r = $this->sdtModel->where("id = $result")->save($update);
                    if($is_o&&$result_r){
                        $sdtModel->commit();
                        $this->success("$result");
                    }else{
                        $sdtModel->rollback();
                        $this->error('服务器繁忙!');
                    }
                }else{
                    $sdtModel->commit();
                    $this->success("$result");

                }

            }else{
                $sdtModel->rollback();
                $this->error('服务器繁忙!');
            }
            //var_dump($certificate);exit;
        }

    }
    function edit(){
        $id = I('get.id');
        if(!$id){
            $this->error('参数错误!');
        }
        $student = $this->sdtModel->where("id = $id")->find();
        $student['work'] = $this->get_work($id);
        $certificate = $this->certiModel->where('is_delete = 0')->select();
        $sdt_cer = $this->get_sdt_certificate($id);
        $this->assign('education',$this->education);
        $this->assign('constellation',$this->constellation);
        $this->assign('zodiac',$this->zodiac);
        $this->assign('blood',$this->blood);
        $this->assign('marriage',$this->marriage);
        $this->assign('language',$this->language);
        $this->assign('certificate',$certificate);
        $this->assign('student',$student);
        $this->assign('sdt_cer',$sdt_cer);
        $this->display();
    }
    function edit_post(){
        if(IS_POST){
            $id = I('get.id');
            if(!$id){
                $this->error('参数错误!');
            }
            $post = I('post.post');
            if(empty($post['photo'])){
                unset($post['photo']);
            }
            $contact = I('post.contact');
            $certificate = I('post.certificate');
            $family['father'] = I('post.father');
            $family['mother'] = I('post.mother');
            $family['mate'] = I('post.mate');
            $family['child'][0] = I('post.child1');
            $family['child'][1] = I('post.child2');
            $introduce = I('post.introduce');

            $post['em_contact'] = json_encode($contact);
            $post['family'] = json_encode($family);
            $post['introduce'] = json_encode($introduce);

            $sdtModel = $this->sdtModel;
            if(!$sdtModel->create($post)){
                $this->error($sdtModel->getError());
            }
            $sdtModel->startTrans();
            $result = $sdtModel->where("id = $id")->save($post);
            //证书表修改
            if($result !== false){
                if(!empty($certificate)){
                    $data['student_id'] = $id;
                    $is_o = true;
                    $sdt_cer = array();
                    $del_res = $this->sdt_certiModel->where("student_id = $id")->delete();
                    if($del_res === false){
                        $is_o = false;
                    }
                    foreach($certificate as $vo){
                        //删除证书表原来的证书
                        $data['certificate_id'] = $vo;
                        $certificate_result = $this->sdt_certiModel->add($data);
                        $cer_info = $this->certiModel->where("id = $vo")->find();
                        $sdt_cer[$vo] = $cer_info['title'];
                        if(!$certificate_result){
                            $is_o = false;
                            //
                        }
                    }
                    $update['certificate'] = json_encode($sdt_cer);
                    $result_r = $this->sdtModel->where("id = $id")->save($update);
                    if($is_o !== false&&$result_r !== false){
                        $sdtModel->commit();
                        $this->success("修改成功!");
                    }else{
                        $sdtModel->rollback();
                        $this->error('服务器繁忙!');
                    }
                }else{
                    $sdtModel->commit();
                    $this->success("修改成功!");

                }

            }else{
                $sdtModel->rollback();
                $this->error('服务器繁忙!');
            }
        }
    }
    function delete(){
        if(IS_POST){
            $ids = I('post.ids');
            //var_dump($ids);exit;
            if(!empty($ids)){
                $this->delete_student($ids);
            }else{
                $this->error('参数错误!');
            }
        }else{
            $id = I('get.id');
            if(!empty($id)){
                $this->delete_student($id);
            }else{
                $this->error('参数错误!');
            }
        }
    }
    function work_index(){
        $id = I('get.id');
        if(!$id){
            $this->error('参数错误!');
        }
        $works = $this->get_work($id);
        $student_info = $this->sdtModel->where("id = $id")->find();
        $this->assign('works',$works);
        $this->assign('name',$student_info['name']);
        $this->display();
    }
    function work_add(){
        $id = I('get.id');
        if(empty($id)){
            $this->error('参数错误');
        }
        $this->assign('id',$id);
        $this->display();
    }
    function work_add_post(){
        if(IS_POST){
            $id = I('get.id');
            if(empty($id)){
                $this->error('参数错误');
            }
            $data = I('post.post');
            $data['student_id'] = $id;
            $data['is_delete'] = 0;

            if(!$this->workModel->create($data)){
                $this->error($this->workModel->getError());
            }
            $result = $this->workModel->add($data);
            if($result){
                $this->success('添加成功!');
            }else{
                $this->error('服务器繁忙');
            }
        }
    }
    function work_edit(){
        if(isset($_GET['id'])){
            $id = I('get.id');
            $work = $this->workModel->where("id = $id")->find();
            if($work === false){
                $this->error('服务器繁忙!');
            }
        }else{
            $this->error('参数错误!');
        }
        $this->assign('work',$work);
        $this->display();
    }
    function work_edit_post(){
        if(IS_POST){
            $id = I('get.id');
           // echo $id;exit;
            if(!$id){
                $this->error('参数错误!');
            }
            $post = I('post.post');
            if(!$this->workModel->create($post)){
                $this->error($this->workModel->getError());
            }
            $result = $this->workModel->where("id = $id")->save($post);
            if($result === false){
                $this->error('服务器繁忙!');
            }else{
                $this->success('修改成功!');
            }
        }
    }
    function work_delete(){
        if(IS_POST){
            //批量删除
            $ids = I('post.ids');
            //var_dump($ids);exit;
            if(!empty($ids)){
                $idstr = join($ids,',');
                $update['is_delete'] = 1;
                //$update['update_time'] = date('Y-m-d H:i:s',time());
                $result = $this->workModel->where("id in ($idstr)")->save($update);

                if($result === false ){
                    $this->error('服务器错误！');

                }else{
                    $this->success('删除成功！');
                }


            }else{
                $this->error('缺少参数！');
            }
        }else{
            if(isset($_GET['id'])){
                $id = I('get.id');
                $update['is_delete'] = 1;
                //$update['update_time']=date('Y-m-d H:i:s');
                $result = $this->workModel->where("id = $id")->save($update);
                if($result === false){
                    $this->error("删除失败!");

                }else{
                    $this->success("删除成功!");
                }
            }else{
                $this->error('缺少参数！');
            }
        }
    }
    //在校课程表现
    function result_index(){
        $id = I('get.id');
        if(!$id){
            $this->error('参数错误!');
        }
        $student = $this->sdtModel->where("id = $id")->find();
        $class = $this->info->where()->select();
        //生成树表格
        import("Tree");
        $tree = new \Tree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $newmenus=array();
        foreach ($class as $m){
            $newmenus[$m['id']]=$m;

        }
        foreach ($class as $n=> $r) {
            $class[$n]['level'] = $this->_get_level($r['id'], $newmenus);
            $class[$n]['parentid_node'] = ($r['parentid']) ? ' class="child-of-node-' . $r['parentid'] . '"' : '';
            $result = $this->result_is_exist($id,$r['id']);
            /*
             * 判断状态
             * if(已经添加此题目评价){
             *      if(父容器课程){
             *          状态 = 获证时间:xxxx
             *          操作 = 修改(Sdtmain/general_edit)|撤销;
             *      }else{(子容器题目)
             *          状态 = 分数:xxx
             *          操作 = 修改(Sdtmain/result_edit)|撤销;
             *      }
             *
             * }else{未添加题目评价
             *      if(父容器课程){
             *          状态 = 未评价(Sdtmain/result_general);
             *      }else{子容器题目
             *          状态 = 未评价(Sdtmain/result_add);
             *      }
             *      操作 = '';
             * }
             * */
            if($result !== false){
                if($result['parent_id'] == 0){
                    $class[$n]['state'] = '获证时间：'.$result['pass_time'];
                    $class[$n]['act'] = '<a  href="' . U("Sdtmain/general_edit", array("result_id" => $result['id']) ). '">修改</a> | <a  class="J_ajax_del" href="' . U("Sdtmain/result_delete", array("student_id" => $id, "info_id" => $r['id']) ). '">撤销</a> ';

                }else{
                    $class[$n]['state'] = '分数:'.$result['score'];
                    $class[$n]['act'] = '<a  href="' . U("Sdtmain/result_edit", array("result_id" => $result['id']) ). '">修改</a> | <a  class="J_ajax_del" href="' . U("Sdtmain/result_delete", array("student_id" => $id, "info_id" => $r['id']) ). '">撤销</a> ';

                }

            }else{
                if($r['parentid'] == 0){
                    $class[$n]['state'] = '<a  href="' . U("Sdtmain/result_general", array("student_id" => $id, "info_id" => $r['id']) ). '">未评价</a> ';
                }else{
                    $class[$n]['state'] = '<a  href="' . U("Sdtmain/result_add", array("student_id" => $id, "info_id" => $r['id']) ). '">未评价</a> ';
                }

                $class[$n]['act'] = '';
            }

        }
        $tree->init($class);
        //var_dump($class);exit;
        $str = "<tr id='node-\$id' \$parentid_node>
					<td style='padding-left:20px;'>\$id</td>
        			<td>\$name</td>
        			<td>\$state</td>
        			<td>\$act</td>
				</tr>";
        $categorys = $tree->get_tree(0, $str);
        //var_dump($categorys);exit;
        $this->assign("categorys", $categorys);


        $this->assign('class',$class);
        $this->assign('student',$student);
        $this->display();
    }
    //填写子分类信息
    function result_add(){
        $student_id = I('get.student_id');
        $info_id = I('get.info_id');
        if(!$student_id||!$info_id){
            $this->error('缺少参数!');
        }
        $student = $this->sdtModel->where("id = $student_id")->find();
        $class = $this->info->where("id = $info_id")->find();
        $parent_id = $class['parentid'];
        $parent_info = $this->info->where("id = $parent_id")->find();
        if($class === false){
            $this->error('服务器繁忙!');
        }
        $this->assign('student',$student);
        $this->assign('class',$class);
        $this->assign('parent',$parent_info);
        //$this->assign('subject',$subject);
        $this->display();
    }
    function result_add_post(){
        if(IS_POST){
            $student_id = I('get.student_id');
            $parent_id = I('get.parent_id');
            if(!$student_id || !$parent_id){
                $this->error('参数错误!');
            }

            $post = I('post.post');
            $is_exist = $this->result_is_exist($student_id,$post['info_id']);
            if($is_exist){
                $this->error('请勿重复评价!');
            }
            if($_POST['class_url']){
                $post['class_photo'] = json_encode($_POST['class_url']);
            }
            if($_POST['works_url']){
                $post['works_photo'] = json_encode($_POST['works_url']);
            }


            $post['student_id'] = $student_id;
            $post['parent_id'] = $parent_id;
            $post['is_delete'] = 0;
            //var_dump($post);exit;
            if(!$this->sdt_result->create($post)){
                $this->error($this->sdt_result->getError());
            }
            $result = $this->sdt_result->add($post);
            if($result){
                $this->success('提交成功!');
            }else{
                $this->error('服务器繁忙!');
            }
        }

    }
    function result_edit(){

        $result_id = I('get.result_id');
        if(!$result_id){
            $this->error('参数错误!');
        }
        $result = $this->sdt_result->where("id = $result_id")->find();
        $student_id = $result['student_id'];
        $info_id = $result['info_id'];
        $parent_id = $result['parent_id'];
        $student = $this->sdtModel->where("id = $student_id")->find();
        $info = $this->info->where("id = $info_id")->find();
        $parent_info = $this->info->where("id = $parent_id")->find();
        if(!$result || !$student || !$parent_info || !$info){
            $this->error('服务器繁忙!');
        }
        if($result['class_photo']){
            $result['class_photo'] = json_decode($result['class_photo'],true);
        }
        if($result['works_photo']){
            $result['works_photo'] = json_decode($result['works_photo'],true);
        }
        $this->assign('student',$student);
        $this->assign('result',$result);
        $this->assign('info',$info);
        $this->assign('parent_info',$parent_info);
        $this->display();


    }
    function result_edit_post(){
        if(IS_POST){
            $result_id = I('get.result_id');
            if(!$result_id){
                $this->error('参数错误!');
            }
            $post = I('post.post');
            if($_POST['class_url']){
                $post['class_photo'] = json_encode($_POST['class_url']);
            }
            if($_POST['works_url']){
                $post['works_photo'] = json_encode($_POST['works_url']);
            }
            if(!$this->sdt_result->create($post)){
                $this->error($this->sdt_result->getError());
            }
            $result = $this->sdt_result->where("id = $result_id")->save($post);
            if($result === false){
                $this->error('服务器繁忙!');
            }else{
                $this->success('修改成功!');
            }
        }

    }
    //父分类信息
    function result_general(){
        $student_id = I('get.student_id');
        $info_id = I('get.info_id');
        if(!$student_id||!$info_id){
            $this->error('缺少参数!');
        }
        $student = $this->sdtModel->where("id = $student_id")->find();
        $class = $this->info->where("id = $info_id")->find();
//        $subject = $this->get_class_info($info_id);
//        if($subject === false){
//            $this->error('服务器繁忙!');
//        }
        $this->assign('student',$student);
        $this->assign('class',$class);
//        $this->assign('subject',$subject);
        $this->display();
    }
    function result_general_post(){
        if(IS_POST){
            $student_id = I('get.student_id');
            $info_id = I('get.info_id');
            if(!$student_id || !$info_id){
                $this->error('参数错误!');
            }

            $post = I('post.post');
            $is_exist = $this->result_is_exist($student_id,$info_id);
            if($is_exist){
                $this->error('请勿重复评价!');
            }
            $post['student_id'] = $student_id;
            $post['info_id'] = $info_id;
            $post['parent_id'] = 0;
            $post['is_delete'] = 0;
            //var_dump($post);exit;
            if(!$this->sdt_result->create($post)){
                $this->error($this->sdt_result->getError());
            }
            $result = $this->sdt_result->add($post);
            if($result){
                $this->success('提交成功!');
            }else{
                $this->error('服务器繁忙!');
            }
        }
    }
    function general_edit(){
        $result_id = I('get.result_id');
        if(!$result_id){
            $this->error('参数错误!');
        }
        $result = $this->sdt_result->where("id = $result_id")->find();

        if(!$result){
            $this->error('服务器繁忙!');
        }
        $student_id = $result['student_id'];
        $info_id = $result['info_id'];

        $student = $this->sdtModel->where("id = $student_id")->find();
        $info = $this->info->where("id = $info_id")->find();
        if( !$student || !$info){
            $this->error('服务器繁忙!');
        }

        $this->assign('student',$student);
        $this->assign('result',$result);
        $this->assign('info',$info);
        //$this->assign('parent_info',$parent_info);
        $this->display();

    }
    function general_edit_post(){
        if(IS_POST){
            $result_id = I('get.result_id');
            if(!$result_id){
                $this->error('参数错误!');
            }
            $post = I('post.post');
            if(!$this->sdt_result->create($post)){
                $this->error($this->sdt_result->getError());
            }
            $result = $this->sdt_result->where("id = $result_id")->save($post);
            if($result === false){
                $this->error('服务器繁忙!');
            }else{
                $this->success('修改成功!');
            }
        }

    }
    function result_delete(){
        $student_id = I('get.student_id');
        $info_id = I('get.info_id');
        if(!$student_id || !$info_id){
            $this->error('参数错误!');
        }
        $update['is_delete'] = 1;
        $where['student_id'] = $student_id;
        $where['info_id'] = $info_id;
        $result = $this->sdt_result->where($where)->save($update);
        if($result){
            $this->success('撤销成功!');
        }else{
            $this->error('服务器繁忙!');
        }
    }
    /*
     * 取得学员信息 id为空为获取全部列表
     *
     */
    private function get_student($id = 0){

        if($id != 0){
            $data = $this->sdtModel->where("id = $id")->select();
        }else{
            $data = $this->sdtModel->where('is_delete = 0')->select();
        }
        return $data;
    }
    /*
     * 获取学员对应的证书
     *@sdt_id 学员id
     *return array(
     *  $id=>title,
     *  .....
     * );
     *
     *
     */
    private function get_sdt_certificate($sdt_id){
        $all_cer = $this->get_all_certificate();
        $where['student_id'] = $sdt_id;
        $where['is_delete'] = 0;
        $sdt_certificate = $this->sdt_certiModel->where($where)->select();

        $data = array();
        foreach($sdt_certificate as $vo){
            $data[$vo['certificate_id']] = $all_cer[$vo['certificate_id']];

        }
        return $data;


    }
    /*
     * 获取所有证书项
     * return array(
     *  $id=>title,
     *  .....
     * );
     * */
    private function get_all_certificate(){
        $cer_data = $this->certiModel->where('is_delete = 0')->select();
        $all_cer = array();
        foreach($cer_data as $vo){
            $all_cer[$vo['id']] = $vo['title'];

        }
        return $all_cer;
    }
    private function get_work($student_id){
        $all = $this->workModel->where("student_id = $student_id AND is_delete = 0")->select();
        return $all;
    }
    /*
     * 学员删除,同时还会删除student_certificate , student_work , student_result的相关信息
     *$ids array:批量删除/int:单个删除
     *
     * */
    private function delete_student($ids){
        //批量删除
        if(is_array($ids)&&IS_POST){
            foreach($ids as $id){

                $update['is_delete'] = 1;
                $sdtModel = $this->sdtModel;
                $sdtModel->startTrans();
                $sdt_res = $sdtModel->where("id = $id")->save($update);
                $flag = true;
                if($sdt_res){
                    //证书
                    $cer_res = $this->sdt_certiModel->where("student_id = $id")->save($update);
                    if($cer_res === false){
                        $flag = false;
                    }
                    //工作记录
                    $work_res = $this->workModel->where("student_id = $id")->save($update);
                    if($work_res === false){
                        $flag = false;
                    }
                    $result_res = $this->sdt_result->where("student_id = $id")->save($update);
                    if($result_res === false){
                        $flag = false;
                    }
                    //执行
                    if($flag){
                        $sdtModel->commit();
                        $this->success('删除成功!');
                    }else{
                        $sdtModel->rollback();
                        $this->error('删除失败!');
                    }

                }
            }
        }else{
            $update['is_delete'] = 1;
            $sdtModel = $this->sdtModel;
            $sdtModel->startTrans();
            $sdt_res = $sdtModel->where("id = $ids")->save($update);
            $flag = true;
            if($sdt_res){
                //证书
                $cer_res = $this->sdt_certiModel->where("student_id = $ids")->save($update);
                if($cer_res === false){
                    //var_dump($ids);exit;
                    $flag = false;
                }
                //工作记录
                $work_res = $this->workModel->where("student_id = $ids")->save($update);
                if($work_res === false){
                    //var_dump($cer_res);exit;
                    $flag = false;
                }
                //执行
                if($flag){
                    $sdtModel->commit();
                    $this->success('删除成功!');
                }else{
                    $sdtModel->rollback();
                    $this->error('删除失败!');
                }

            }

        }
    }
    /*
     *获取课程信息
     *  $parent_id==0?获取所有:获取对应parent_id的子信息;
     *
     * */
    private function get_class_info($parent_id = 0){
        if($parent_id == 0){
            $parents = $this->info->where('parentid = 0')->select();
            if($parents !== false){
                foreach($parents as $key=>$vo){
                    $id = $vo['id'];
                    $children = $this->info->where("parentid = $id")->select();
                    if($children !== false){
                        $parents[$key]['children'] = $children;
                    }else{
                        return false;
                    }
                }
                return $parents;
            }else{
                return false;
            }
        }else{
            $children = $this->info->where("parentid = $parent_id")->select();
            if($children !== false){
                return $children;
            }else{
                return false;
            }
        }

    }
    //判断是否已经添加过评价
    private function result_is_exist($student_id,$info_id){
        $result = $this->sdt_result->where("student_id = $student_id AND info_id = $info_id AND is_delete = 0")->find();
        //var_dump($result);exit;
        if(is_array($result)&&count($result)>0){
            return $result;
        }else{
            return false;
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

} 