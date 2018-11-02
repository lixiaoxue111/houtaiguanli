<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_models extends CI_Model
{
    // 查询
    public function get_all()
    {
        $sql="select * from student";
        $query=$this -> db -> query($sql);
        return $query -> result();
    }
    //增加
    public function add_students($sno,$sname,$sage,$ssex,$sclass,$school,$major){
       $this -> db -> insert('student',array(
           'sno' => $sno,
           'sname' => $sname,
           'sage' => $sage,
           'ssex' => $ssex,
           'sclass' => $sclass,
           'sschool' => $school,
           'smajor' => $major
       ));
        return $this ->db ->affected_rows();
}
    //删除
    public function del_students($sno){
        $this -> db -> where('sno',$sno);
        $this->db->delete('student');
        return $this ->db ->affected_rows();
    }
    //修改
    public function update_students($sno,$sname,$sage,$ssex,$sclass,$school,$major){
        $data = array(
            'sno' => $sno,
            'sname' => $sname,
            'sage' => $sage,
            'ssex' => $ssex,
            'sclass' => $sclass,
            'sschool' => $school,
            'smajor' => $major
        );
        $this->db->where('sno',$sno);
        $this -> db -> update('student',$data);
        return $this ->db ->affected_rows();
    }
}
