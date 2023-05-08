<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Report_Process extends CI_Model{

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

		public function f_get_totaldeduction($from_date, $to_date) {

			$sql	=	"SELECT a.emp_no,
								b.emp_name,
								SUM(a.insuarance) insuarance,
								SUM(a.ccs) ccs,
								SUM(a.hbl) hbl,
								SUM(a.telephone) telephone,
								SUM(a.med_adv) med_adv,
								SUM(a.festival_adv) festival_adv,
								sum(a.tf)tf,
								sum(a.med_ins)med_ins,
								sum(a.comp_loan)comp_loan,
								sum(a.ptax)ptax,
								sum(a.gpf)gpf,
								sum(a.epf)epf,
								sum(a.other_deduction)other_deduction,
								SUM(itax) itax FROM td_pay_slip a,md_employee b
											   WHERE a.emp_no=b.emp_code
											   and  a.trans_date BETWEEN '$from_date' AND '$to_date'
											   GROUP BY a.emp_no, b.emp_name
						";
			
			$result = $this->db->query($sql);

			return $result->result();

		}

		public function f_get_emp_dtls($empno, $sal_month,$sal_yr){

			$result = $this->db->query("select a.trans_date,a.trans_no,a.sal_month,a.sal_year,a.emp_no,a.basic_pay,
			a.da_amt,a.hra_amt,a.med_allow,a.othr_allow,a.insuarance,a.ccs,a.hbl,a.telephone,a.med_adv,a.festival_adv,
			a.tf,a.med_ins,a.comp_loan,a.ptax,a.itax,a.gpf,a.epf,a.other_deduction,a.tot_deduction,a.net_amount,a.remarks
			,b.emp_name,b.designation,b.phn_no,b.department,b.pan_no
			  from 
			  td_pay_slip a,md_employee b where a.emp_no =b.emp_code and a.emp_no = $empno
			  and a.sal_month=$sal_month and a.sal_year=$sal_yr ");

			//$result	=	$this->db->query($sql);

			return $result->row();
		}


		public function f_count_emp($emp_code){

			$result = $this->db->query("select count(*)count_emp from md_employee where emp_code = $emp_code");

			//$result	=	$this->db->query($sql);

			return $result->row();
		}
		public function f_get_gov_ben_salary_list($sal,$month){

			$sql	="SELECT
			(a.basic_pay+a.da_amt+a.hra_amt+a.med_allow+a.othr_allow) - (a.insuarance+a.ccs+a.hbl+a.telephone+a.med_adv+a.festival_adv+a.tf+a.med_ins+a.comp_loan+ a.ptax + itax + gpf +epf + a.other_deduction) as net_pay ,CURDATE() Value_Date,2017 Branch_Code,'Saving' Sender_Account_Type,'50100385096908' Remitter_Account_No,
			ifsc,50100385096908 Debit_Account,'Saving' Beneficiary_Account_type,
			bank_ac_no Bank_Account_Number,
			b.emp_name,'' Remittance_Details,2 Debit_Account_System,''Originator_Of_Remmittance,
			phn_no EMAILMOBILENO
			FROM td_pay_slip a,md_employee b
			WHERE a.emp_no=b.emp_code
			and a.sal_month=$month
			and a.sal_year=$sal
			and emp_catg in(1,2)";
			$result = $this->db->query($sql);
			return $result->result();
		}

		public function f_get_emp_pf_dtls($empno,$ssal_yr,$esal_yr){

			$start = $ssal_yr.'-01-04';
			$end   = $esal_yr.'-03-31';
			$sql   ="SELECT b.`emp_name`,b.`dob`,b.`UAN`,b.`bank_ac_no`, CONCAT(c.month_name,' ',a.sal_year)WAGE_MONTH,
			MONTHNAME(LAST_DAY(CONCAT(a.sal_year,'-',c.id,'-','01')  + INTERVAL 1 MONTH))CONTRIBUTION_MONTH,
			YEAR(LAST_DAY(CONCAT(a.sal_year,'-',c.id,'-','01')  + INTERVAL 1 MONTH))CONTRIBUTION_YR,a.basic_pay+a.da_amt as EPF_WAGES,15000 EPF_WAGE,
			round((a.basic_pay+a.da_amt)*(12/100),2) employees_EPF,round(15000*(8.33/100),2) EMPLOYER_EPF,
			round((a.basic_pay+a.da_amt)*(12/100) - (15000*(8.33/100)),2) EMPLOYER_epfs 
			FROM td_pay_slip a,md_employee b,md_month c 
			where a.emp_no=b.emp_code 
			and a.emp_no = $empno
			and a.`trans_date` between '$start' and '$end'
			and a.sal_month=c.id 
			ORDER BY `b`.`emp_name` ASC";
			$result = $this->db->query($sql);
			return $result->result();

		}

    }
?>