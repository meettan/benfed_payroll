<?php

	class Admin extends CI_Controller{

		public function __construct(){
			parent::__construct();
			if(!isset($this->session->userdata('loggedin')['user_id'])){
            
				redirect('Payroll_Login/login');
	
			}
			$this->load->model('Login_Process');

			$this->load->model('Admin_Process');

		}

		public function parameter(){

    		$this->load->view('post_login/payroll_main');

    		$param_dtls['parameter'] = $this->Admin_Process->f_get_particulars("md_parameters",NULL,NULL,0);
    		
			$this->load->view('parameter/dashboard', $param_dtls);

    		$this->load->view('post_login/footer'); 
		}

		public function parameter_edit(){

			if($_SERVER['REQUEST_METHOD'] == "POST") {
				
				$sl_no  			=   $this->input->post('sl_no');
		
				$param_desc       	=   $this->input->post('param_desc');
		
				$param_value   		=   $this->input->post('param_value');
		
				$data_array = array (
		
					"param_value"     	=>  $param_value,

					"modified_by"		=>  $this->session->userdata['loggedin']['user_id'],

					"modified_dt"    =>  date('Y-m-d h:i:s')

				);
		
				$where = array(
		
					"sl_no"       =>  $sl_no
		
				);
				
				$this->session->set_flashdata('msg', 'Successfully updated!');
		
				$this->Admin_Process->f_edit('md_parameters', $data_array, $where);
		
				redirect('vls');
		
			}
		
			else {
		
				$where = array(
		
					"sl_no"     =>  $this->input->get('sl_no')
		
				);
				
				//Bonus list of latest month
				$parameter['param_dtls']    =   $this->Admin_Process->f_get_particulars("md_parameters", NULL, $where, 1);
				$this->load->view('post_login/payroll_main');
				$this->load->view("parameter/edit", $parameter);
				$this->load->view('post_login/footer');
		
			}
		
		}
	public function ptax(){

		$data['ptax'] = $this->Admin_Process->f_get_particulars("md_ptax",NULL,NULL,0);
		$this->load->view('post_login/payroll_main');
		$this->load->view('ptax/dashboard', $data);
		$this->load->view('post_login/footer'); 
	}
	public function ptax_edit(){		//Edit Employee

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$data_array = array (

				"ptax"        =>  $this->input->post('ptax'),
				"updated_by"  =>  $this->session->userdata['loggedin']['user_id'],
				"updated_at"  =>  date('Y-m-d h:i:s')
			);  

			$where  =   array(
				"id"         =>  $this->input->post('id')
			);
			
			$this->session->set_flashdata('msg', 'Successfully updated!');
			$this->Admin_Process->f_edit('md_ptax', $data_array, $where);
			$this->ptax();

		}
		else {

			$where = array(
				"id"       =>  base64_decode($this->input->get('sl_no'))
			);	

			$data['ptax_dtls']  =  $this->Admin_Process->f_get_particulars("md_ptax",NULL,$where,1);
			$this->load->view('post_login/payroll_main');
			$this->load->view("ptax/edit", $data);
			$this->load->view('post_login/footer');

		}

	}	
		public function dept() {	//Department Dashboard

			$select = array("id","name");
			$dept['dept_dtls']    =   $this->Admin_Process->f_get_particulars("md_department", $select,NULL, 0);
			$this->load->view('post_login/payroll_main');
			$this->load->view("dept/dashboard", $dept);
			$this->load->view('post_login/footer');
		}
		public function dept_add() {	//Add Employee		

			if($_SERVER['REQUEST_METHOD'] == "POST") {
				
				$cnt = $this->Admin_Process->match_name($this->input->post('name'));
				
				if($cnt == 0){
					$data_array = array (
						"name"          =>  $this->input->post('name'),
						"created_by"    =>  $this->session->userdata['loggedin']['user_id'],
						"created_at"    =>  date('Y-m-d h:i:s')
					);  
					
					$this->Admin_Process->f_insert('md_department', $data_array);
					$this->session->set_flashdata('msg', 'Successfully added!');
					$this->dept();
				}else{
					$this->session->set_flashdata('msg', 'Name Exist');
					$this->dept();
				}
				
			}
			else {
				$this->load->view('post_login/payroll_main');
				$this->load->view("dept/add");
				$this->load->view('post_login/footer');
			}
		}
		public function dept_edit(){		//Edit Employee

			if($_SERVER['REQUEST_METHOD'] == "POST") {
	
				$data_array = array (
	
					"name"         =>  $this->input->post('name'),
					"updated_by"  => $this->session->userdata['loggedin']['user_id'],
					"updated_at"  =>  date('Y-m-d h:i:s')
				);  
	
				$where  =   array(
					"id"         =>  $this->input->post('id')
				);
				
				$this->session->set_flashdata('msg', 'Successfully updated!');
	
				$this->Admin_Process->f_edit('md_department', $data_array, $where);
	
				$this->dept();
	
			}
	
			else {

				$where = array(
					"id"       =>  $this->input->get('id')
				);	

				$data['dept_dtls']  =  $this->Admin_Process->f_get_particulars("md_department",NULL,$where,1);
				$this->load->view('post_login/payroll_main');
				$this->load->view("dept/edit", $data);
	
				$this->load->view('post_login/footer');
	
			}
	
		}

	public function employee() {		//Employee Dashboard

		//Employee List
		$select = array("a.emp_code", "a.emp_name", "a.emp_catg",
						"a.department",'b.district_name');

		$employee['employee_dtls']    =   $this->Admin_Process->f_get_particulars("md_employee a,md_district b", $select, array("a.emp_dist = b.district_code"=> NULL, "a.emp_status" => 'A'), 0);
		//Category List 
		$employee['category_dtls']    =   $this->Admin_Process->f_get_particulars("md_category", NULL, NULL, 0);

		$this->load->view('post_login/payroll_main');

		$this->load->view("employee/dashboard", $employee);

		$this->load->view('post_login/footer');
		
	}

	public function check_empcode(){
		$emp_code = trim($this->input->post("empcode"));
		$query = $this->db->get_where('md_employee', array('emp_code' => $emp_code ));
		$count = $query->num_rows(); //counting result from query
		echo $count;
	}

	public function employee_add() {	//Add Employee		

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			$validation_error = '';

			//$maxCode     =   $this->Payroll->f_get_particulars("md_employee", array("MAX(emp_code) + 1 emp_code"), null, 1);
			$this->form_validation->set_rules('emp_code', 'Employee code', 'required');
			$this->form_validation->set_rules('emp_name', 'Employee Name', 'required');
			$this->form_validation->set_rules('emp_catg', 'Employee Category', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('join_dt', 'Joining Date', 'required');
			$this->form_validation->set_rules('phn_no', 'Phone Number', 'required');
			$this->form_validation->set_rules('basic_pay', 'Basic Pay', 'required');

			if($this->form_validation->run() == TRUE){
				$query = null; //emptying in case
				$query = $this->db->get_where('md_employee', array('emp_code' => trim($this->input->post('emp_code'))));
				$count = $query->num_rows(); //counting result from query
		
				if ($count === 0) {
				//$this->Admin_Process->f_get_particulars('md_employee', $data_array);
				$data_array = array (

					"emp_code"         =>  $this->input->post('emp_code'),
					"emp_name"         =>  $this->input->post('emp_name'),
					"emp_catg"         =>  $this->input->post('emp_catg'),
					"emp_dist"         =>  $this->input->post('emp_dist'),
					"dob"          	   =>  $this->input->post('dob'),
					"join_dt"          =>  $this->input->post('join_dt'),
					"ret_dt"           =>  $this->input->post('ret_dt'),
					"phn_no"           =>  $this->input->post('phn_no'),
					"email"            =>  $this->input->post('email'),
					"designation"      =>  $this->input->post('designation'),
					"department"       =>  $this->input->post('department'),
					"emp_addr"         =>  $this->input->post('emp_addr'),
					"pan_no"           =>  $this->input->post('pan_no'),
					"aadhar_no"        =>  $this->input->post('aadhar'),
					"bank_name"        =>  $this->input->post('bank_name'),
					"bank_ac_no"       =>  $this->input->post('bank_ac_no'),
					"ifsc"             =>  $this->input->post('ifsc'),
					"pf_ac_no"         =>  $this->input->post('pf_ac_no'),
					"uan"              =>  $this->input->post('uan'),
					"basic_pay"        =>  $this->input->post('basic_pay'),
					"created_by"       =>  $this->session->userdata['loggedin']['user_id'],
					"created_dt"       =>  date('Y-m-d h:i:s')

				);  
		
				$this->Admin_Process->f_insert('md_employee', $data_array);
				$this->session->set_flashdata('success', 'Successfully added!');
				redirect('stfemp');
			   }else{
				$this->session->set_flashdata('msg', 'Employee Code Already Exist');
				redirect('stfemp');
			   }
			}else{

                $validation_error  = validation_errors();
				$this->session->set_flashdata('msg', $validation_error);
				redirect("emadst");

			}	
		}

		else {

			//Category List 
			$employee['category_dtls'] =   $this->Admin_Process->f_get_particulars("md_category", NULL, NULL, 0);
			$employee['dist_dtls']     =   $this->Admin_Process->f_get_particulars("md_district", NULL, NULL, 0);
			$employee['dept']          =   $this->Admin_Process->f_get_particulars("md_department", NULL, NULL, 0);
			$this->load->view('post_login/payroll_main');

			$this->load->view("employee/add", $employee);

			$this->load->view('post_login/footer');

		}

	}

		public function employee_delete(){		//Delete Employee

			$where = array(
				
				"emp_code"    =>  $this->input->get('empcd'),

				
			);

			$this->Admin_Process->f_delete('md_employee', $where);
	
			$this->session->set_flashdata('msg', 'Successfully Deleted!');
	
			redirect("stfemp");
	
		}

		public function employee_edit(){		//Edit Employee

			if($_SERVER['REQUEST_METHOD'] == "POST") {

			$this->form_validation->set_rules('emp_code', 'Employee Code', 'required');
			$this->form_validation->set_rules('emp_name', 'Employee Name', 'required');
			$this->form_validation->set_rules('emp_catg', 'Employee Category', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('join_dt', 'Joining Date', 'required');
			$this->form_validation->set_rules('phn_no', 'Phone Number', 'required');
			$this->form_validation->set_rules('basic_pay', 'Basic Pay', 'required');
			if($this->form_validation->run() == TRUE){
	
				$data_array = array (
	
					"emp_name"         =>  $this->input->post('emp_name'),
	
					"emp_catg"         =>  $this->input->post('emp_catg'),

					"emp_dist"         =>  $this->input->post('emp_dist'),

					"dob"          	   =>  $this->input->post('dob'),
	
					"join_dt"          =>  $this->input->post('join_dt'),
					
					"ret_dt"           =>  $this->input->post('ret_dt'),
					
					"phn_no"           =>  $this->input->post('phn_no'),
					
					"email"            =>  $this->input->post('email'),
					
					"designation"      =>  $this->input->post('designation'),
					
					"department"       =>  $this->input->post('department'),
	
					"emp_addr"         =>  $this->input->post('emp_addr'),
	
					"pan_no"           =>  $this->input->post('pan_no'),

					"aadhar_no"        =>  $this->input->post('aadhar'),
	
					"bank_name"        =>  $this->input->post('bank_name'),
	
					"bank_ac_no"       =>  $this->input->post('bank_ac_no'),

					"ifsc"             =>  $this->input->post('ifsc'),
	
					"pf_ac_no"         =>  $this->input->post('pf_ac_no'),

					"uan"              =>  $this->input->post('uan'),
	
					"basic_pay"        =>  $this->input->post('basic_pay'),

					"emp_status"       => $this->input->post('emp_status'),

					"salary_status"    => $this->input->post('emp_status'),

					"remarks"           => $this->input->post('remarks'),
	
					"modified_by"       => $this->session->userdata['loggedin']['user_id'],
	
					"modified_dt"       =>  date('Y-m-d h:i:s')
	
				);  
	
				$where  =   array(
					
					"emp_code"         =>  $this->input->post('emp_code')
				);
				
				$this->session->set_flashdata('msg', 'Successfully updated!');
	
				$this->Admin_Process->f_edit('md_employee', $data_array, $where);
	
				redirect('stfemp');
			}else{

				$this->session->set_flashdata('msg', validation_errors());
	
				redirect('stfemp');

			}	
	
			}
	
			else {

				//For Employee Details
				unset($select);
				$select = array ("emp_code", "emp_name", "emp_catg","emp_dist", "dob","email", "phn_no",
								 "designation", "department","emp_addr","salary_status",
								 "pan_no", "bank_name", "bank_ac_no", "ifsc","join_dt","ret_dt",
								 "pf_ac_no","uan","basic_pay","aadhar_no","emp_status");
	
	
				$where = array(
	
					"emp_code"     =>  $this->input->get('emp_code')
	
				);
	
				//Category List 
				$employee['category_dtls']    =   $this->Admin_Process->f_get_particulars("md_category", NULL, NULL, 0);
				$employee['dist_dtls']    =   $this->Admin_Process->f_get_particulars("md_district", NULL, NULL, 0);
	
				//Employee list
				$employee['employee_dtls']    =   $this->Admin_Process->f_get_particulars("md_employee", $select, $where, 1);
				$employee['dept']          =   $this->Admin_Process->f_get_particulars("md_department", NULL, NULL, 0);
				$this->load->view('post_login/payroll_main');
	
				$this->load->view("employee/edit", $employee);
	
				$this->load->view('post_login/footer');
	
			}
	
		}

		public function emp_dtls(){

			$emp_code 	= 	 $this->input->get('emp_code');

			$count   =   $this->Admin_Process->f_count_emp($emp_code);

			echo $count->count_emp;

		}

		public function ajaxemplist(){

			$status = $this->input->post('active_status');
			$select = array("emp_code", "emp_name", "emp_catg",
							"department");
	
			$employee['employee_dtls']    =   $this->Admin_Process->f_get_particulars("md_employee", $select, array("emp_status" => $status), 0);
			//Category List 
			$employee['category_dtls']    =   $this->Admin_Process->f_get_particulars("md_category", NULL, NULL, 0);
			$data = $this->load->view('employee/ajaxemplist',$employee);
			return $data;

		}

	public function change_passwoerd(){

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $oldpassword = $this->input->post('oldpass');
            $password = $this->input->post('password');
            // $this->session->userdata['loggedin']['user_id']
            $returnData = $this->Admin_Process->checkOldPassword($oldpassword);
            if ($returnData == 1) {
                $dataArray = array(
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'modified_by' => $this->session->userdata['loggedin']['user_name'],
                    'modified_dt' => date('Y-m-d h:i:s')
                );
                $where = array('user_id' => $this->session->userdata['loggedin']['user_id']);
                $this->Admin_Process->f_edit('md_users', $dataArray, $where);
               // $this->Admin_Process->update_fin_user($dataArray, $this->session->userdata['loggedin']['user_id']);
                $this->session->set_flashdata('success', 'Successfully Change Password!');
              //  echo "<script>alert('Successfully Change Password!');</script>";
				redirect('changepassword');
            } else {
                $this->session->set_flashdata('error', 'Incorrect old password!');
                echo "<script>alert('Wrong Password!');</script>";
				redirect('changepassword');
            }

            
        } else {

            $this->load->view('post_login/payroll_main');

            $this->load->view("user/change_password");

            $this->load->view('post_login/footer');
        }
    }

	public function user(){
		$where = array("user_status" => 'A');
		$data['user_dtls']    =   $this->Admin_Process->f_get_particulars("md_users", NULL, $where, 0);
		$this->load->view('post_login/payroll_main');
		$this->load->view("user/dashboard",$data);
		$this->load->view('post_login/footer');
	}

	public function user_add()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
               $pass  = 123;
                $data_array = array(
                    "user_id"       =>  trim($this->input->post('user_id')),
                    "password"      =>  password_hash($pass, PASSWORD_DEFAULT),
					"user_type"     =>  $this->input->post('user_type'),
                    "user_name"     =>  $this->input->post('user_name'),
                    "user_status"     =>  'A',
                    "branch_id"     =>  $this->input->post('branch_id'),
                    "st"            =>  0,
                    "created_by"    =>  $this->session->userdata['loggedin']['user_name'],
                    "created_dt"    =>  date('Y-m-d h:i:s')
                );
                $this->Admin_Process->f_insert('md_users', $data_array);
              //  $this->session->set_flashdata('msg', 'Successfully added!');

                $this->session->set_flashdata('success', 'Successfully Add User!');
                redirect('admin/user');
            
        } else {
			$data['dist_dtls']     =   $this->Admin_Process->f_get_particulars("md_district", NULL, NULL, 0);
            $this->load->view('post_login/payroll_main');
            $this->load->view("user/add",$data);
            $this->load->view('post_login/footer');
        }
    }


}

?>
		
		 