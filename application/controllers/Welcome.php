<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
    //查询
    public function select_all()
    {
        //$this->load->view('student');
        $this->load->model('Student_models');
        $que_result = $this->Student_models->get_all();
        foreach ($que_result as $row) {
            echo($row->sno);
            echo('|');
            echo($row->sname);
            echo('|');
            echo($row->sage);
            echo('|');
            echo($row->sclass);
            echo('|');
            echo($row->sgit);
            echo('|');
            echo('</br>');
        }
     }

    //增加
    public function add(){
        $this -> load -> view('add_student');
        $sno=$this -> input -> post('sno');
        //$sno=$_POST['sno'];
        $sName=$this -> input -> post('sName');
        $sAge=$this -> input -> post('sAge');
        $sex=$this -> input -> post('sex');
        $sClass=$this -> input -> post('sClass');
        $school=$this -> input -> post('school');
        $major=$this -> input -> post('major');
        $this->load->model('Student_models');
        $rows=$this -> Student_models -> add_students($sno,$sName,$sAge,$sex,$sClass,$school,$major);
        if($rows > 0){
            //echo "成功";
            $this -> select_all();
        }else{
            echo "失败";
        }
    }
    //删除
    public function delete(){
        $sno=$this -> input -> post('sno');
        $this->load->model('Student_models');
        $query=$this->Student_models->del_students($sno);
        if($query>0){
            echo "删除成功";
            $this -> select_all();
        }else{
            echo "删除失败";
        }
    }
    //修改
    public function update(){
        $this->load->model('Student_models');
        $query=$this->Student_models->update_students(24,'1','1','1',1,'1','1');
        if($query>0){
            echo "update成功";
            $this -> select_all();
        }else{
            echo "update失败";
        }
    }

    }
