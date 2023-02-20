<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Salary_Process extends CI_Model{

		public function f_get_particulars($table_name, $select=NULL, $where=NULL, $flag=NULL) {

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

		//For inserting row
		public function f_insert($table_name, $data_array) {

			$this->db->insert($table_name, $data_array);

			return;

		}

		//For Editing row
		public function f_edit($table_name, $data_array, $where) {

			$this->db->where($where);
			$this->db->update($table_name, $data_array);

			return;

		}

		//For Deliting row

		public function f_delete($table_name, $where) {

			$this->db->delete($table_name, $where);

			return;

		}

		public function f_sal_dtls($emp_code) 										//Calculate Earnings
        {

            $sql = $this->db->query("SELECT a.basic_pay,
										    basic_pay * (select param_value from md_parameters where sl_no=1)/100 as da,
									        basic_pay * (select param_value from md_parameters where sl_no=2)/100 as hra,
											(select param_value from md_parameters where sl_no=4)epf, 
										    (select param_value from md_parameters where sl_no=3) ma
									FROM md_employee a 
								    WHERE a.emp_code ='$emp_code'");
            return $sql->row();

		}

		public function f_get_earning() {											//Retrieve Earnings for Dashboard
			$data = $this->db->query( "SELECT a.emp_code as emp_code, 
											  b.emp_name as emp_name,
											  b.emp_dist as emp_dist,
											  c.district_name as district_name,
											  MAX(a.effective_date) as effective_date
									    FROM td_income a ,md_employee b,md_district c
										WHERE a.emp_code = b.emp_code
										AND   b.emp_dist = c.district_code
										AND   (b.emp_status = 'A' OR b.emp_status = 'S')
									    GROUP BY a.emp_code, b.emp_name,c.district_name");
												
			return $data->result();
		}


		//Retive Deduction List
		/*public function f_get_deduction() {

			$sql = "SELECT emp_cd, MAX(cast(created_dt As DATE)) sal_date FROM td_deductions
														  GROUP BY emp_cd";
												  
			$result		=	$this->db->query($sql);	
			
			if($result->num_rows() > 0){

				foreach($result->result() as $row) {

					$where = array(
	
						"emp_cd"			=>	$row->emp_cd,
	
						"created_dt"		=>	$row->sal_date
	
					);
	
					$data[] = $this->f_get_particulars("td_deductions", NULL, $where, 1);

				}

				return $data;

			}
			
			else{

				return false;
				
			}

		}*/


		//Retive Attendance List
		/*public function f_get_attendance() {

			$sql = "SELECT emp_cd, MAX(trans_dt) trans_dt FROM td_attendance
				GROUP BY emp_cd";
												  
			$result		=	$this->db->query($sql);	
			
			if($result->num_rows() > 0){

				foreach($result->result() as $row) {

					$where = array(
	
						"emp_cd"	=>	$row->emp_cd,
	
						"trans_dt"	=>	$row->trans_dt
	
					);
	
					$data[] = $this->f_get_particulars("td_attendance", NULL, $where, 1);

				}

				return $data;

			}
			
			else{
				return false;
			}

		}*/


		//Retive Bonus List
		/*public function f_get_bonus() {

			$sql = "SELECT emp_no, MAX(trans_dt) trans_dt FROM td_bonus
														  GROUP BY emp_no";
												  
			$result		=	$this->db->query($sql);	
			
			if($result->num_rows() > 0){

				foreach($result->result() as $row) {

					$where = array(
	
						"emp_no"	=>	$row->emp_no,
	
						"trans_dt"	=>	$row->trans_dt
	
					);
	
					$data[] = $this->f_get_particulars("td_bonus", NULL, $where, 1);

				}

				return $data;

			}
			
			else{

				return false;

			}

		}*/


		//Retive Incentive List
		/*public function f_get_incentive() {

			$sql = "SELECT emp_no, MAX(trans_dt) trans_dt FROM td_incentive
														  GROUP BY emp_no";
												  
			$result		=	$this->db->query($sql);	
			
			if($result->num_rows() > 0){

				foreach($result->result() as $row) {

					$where = array(
	
						"emp_no"	=>	$row->emp_no,
	
						"trans_dt"	=>	$row->trans_dt
	
					);
	
					$data[] = $this->f_get_particulars("td_incentive", NULL, $where, 1);

				}

				return $data;

			}
			
			else{

				return false;
				
			}

		}*/

		//For Periodic Increment
		/*public function f_get_increment() {

			$sql = "SELECT emp_cd, MAX(effective_dt) trans_dt FROM md_basic_pay
														      GROUP BY emp_cd";
												  
			$result		=	$this->db->query($sql);	
			
			if($result->num_rows() > 0){

				foreach($result->result() as $row) {

					$where = array(
	
						"emp_cd"	    =>	$row->emp_cd,
	
						"effective_dt"	=>	$row->trans_dt
	
					);
	
					$data[] = $this->f_get_particulars("md_basic_pay", NULL, $where, 1);

				}

				return $data;

			}
			
			else{

				return false;
				
			}

		}*/

		//For Salary slip generation
		public function f_get_generation() {

			$sql = "SELECT sal_month, sal_year, 
						   MAX(trans_date) trans_date
					FROM   td_salary 
					GROUP BY sal_month, 
							 sal_year LIMIT 1";

			$result	=	$this->db->query($sql);

			return $result->row();
			
		}

		//For Where in Clause for employees
		public function f_get_particulars_in($table_name, $where_in=NULL, $where=NULL) {

			if(isset($where)){

				$this->db->where($where);

			}

			if(isset($where_in)){

				$this->db->where_in('emp_no', $where_in);

			}
			
			$result	=	$this->db->get($table_name);

			return $result->result();

		}


		//For Total Deduction
		public function f_get_totaldeduction($from_date, $to_date) {

			$sql	=	"SELECT emp_no,
								emp_name,
								SUM(gen_adv) gen_adv,
								SUM(gen_intt) gen_intt,
								SUM(festival_adv) festival_adv,
								SUM(lic) lic,
								SUM(pf) pf,
								SUM(ptax) ptax,
								SUM(itax) itax FROM td_pay_slip 
											   WHERE trans_date BETWEEN '$from_date' AND '$to_date'
											   GROUP BY emp_no, emp_name
						";
			
			$result = $this->db->query($sql);

			return $result->result();

		}


		//For last Arear(Stopped) Salary for employee(s)
		public function f_get_stopsalary() {

			$sql = "SELECT emp_no, MAX(trans_dt) trans_dt FROM td_stop_salary
														  GROUP BY emp_no";
												  
			$result		=	$this->db->query($sql);	
			
			if($result->num_rows() > 0){

				foreach($result->result() as $row) {

					$where = array(
	
						"emp_no"	    =>	$row->emp_no,
	
						"trans_dt"   	=>	$row->trans_dt
	
					);
	
					$data[] = $this->f_get_particulars("td_stop_salary", NULL, $where, 1);

				}

				return $data;

			}
			
			else{

				return false;
				
			}

		}

	}
	

?>
