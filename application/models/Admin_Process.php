<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_Process extends CI_Model{

		public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag = NULL) {

			if(isset($select)) {

				$this->db->select($select);

			}

			if(isset($where)) {

				$this->db->where($where);

			}

			$result		=	$this->db->get($table_name);

			if($flag == 1) {

				return $result->row();
				
			}else {

				return $result->result();

			}

		}

        public function f_edit($table_name, $data_array, $where) {

			$this->db->where($where);
			$this->db->update($table_name, $data_array);

			return;

		}

		//For inserting row
		public function f_insert($table_name, $data_array) {

			$this->db->insert($table_name, $data_array);

			return;

		}

		//For Deliting row
		public function f_delete($table_name, $where) {

			$this->db->delete($table_name, $where);

			return;

		}

		public function f_count_emp($emp_code){

			$result = $this->db->query("select count(*)count_emp from md_employee where emp_code = $emp_code");

			//$result	=	$this->db->query($sql);

			return $result->row();
		}

		public function match_name($name){
			$result = NULL ;
			$result = $this->db->query("select ifnull(count(*),0) cnt from md_department where name Like '$name'");
			$result = $result->row();
			return $result->cnt;
		}

		public function checkOldPassword($oldpassword){
			$user_id=$this->session->userdata['loggedin']['user_id'];
			
			$data=$this->db->where('user_id',$user_id)->get('md_users');
			
			if ($data->num_rows() > 0) {
				$row = $data->row();
				if(password_verify($oldpassword, $row->password)){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

    }
?>