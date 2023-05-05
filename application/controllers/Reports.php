<?php

	class Reports extends CI_Controller{

		public function __construct(){
			parent::__construct();
            if(!isset($this->session->userdata('loggedin')['user_id'])){
                redirect('Payroll_Login/login');
            }
			$this->load->model('Login_Process');
            $this->load->model('Report_Process');
            $this->load->model('Admin_Process');
            $this->load->helper('paddyrate_helper');
		}

        
//Category wise 

public function salarycatgreport() {

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        // echo 'hi';
        // die();
        //Employee Ids for Salary List
        $select     =   array("emp_code");

        $where      =   array(

            "emp_catg"  =>  $this->input->post('category')

        );

        $emp_id     =   $this->Report_Process->f_get_particulars("md_employee", $select, $where, 0);

        //Temp variable for emp_list
        $eid_list   =   [];

        for($i = 0; $i < count($emp_id); $i++) {

            array_push($eid_list, $emp_id[$i]->emp_code);

        }


        //List of Salary Category wise
        unset($where);
        $where = array (
            "m.emp_code = t.emp_no" =>  NULL,
            "t.sal_month"     =>  $this->input->post('sal_month'),

            "t.sal_year"      =>  $this->input->post('year')

        );

        $salary['list']               =   $this->Report_Process->f_get_particulars_in("md_employee m,td_pay_slip t", $eid_list, $where);

        // $salary['attendance_dtls']    =   $this->Report_Process->f_get_attendance();

        //Employee Group Count
        unset($select);
        unset($where);

        $select =   array(

            "m.emp_code",  "COUNT(m.emp_code) count","m.emp_name"

        );

        $where  =   array(

            "t.sal_month"     =>  $this->input->post('sal_month'),

            "t.sal_year = '".$this->input->post('year')."' GROUP BY m.emp_code,m.emp_name"      =>  NULL

        );

        $salary['count']              =   $this->Report_Process->f_get_particulars("md_employee m,td_pay_slip t", $select, $where, 0);
        // f_get_particulars("md_employee m, td_pay_slip t", $select, $where, 0);

        $this->load->view('post_login/payroll_main');

        $this->load->view("reports/salary", $salary);

        $this->load->view('post_login/footer');

    }

    else {

        //Month List
        $salary['month_list'] =   $this->Report_Process->f_get_particulars("md_month",NULL, NULL, 0);

        //For Current Date
        $salary['sys_date']   =   $_SESSION['sys_date'];

        //Category List
        $salary['category']   =   $this->Report_Process->f_get_particulars("md_category", NULL, array('category_code IN (1,2,3)' => NULL), 0);

        $this->load->view('post_login/payroll_main');

        $this->load->view("reports/salary", $salary);

        $this->load->view('post_login/footer');

    }

}

    //For Salary Statement

    public function paystatementreport(){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Employees salary statement
            $select = array(

                "m.emp_name", "m.bank_ac_no",
                
                "(t.basic_pay+t.da_amt+t.hra_amt+t.med_allow+t.othr_allow) - (t.insuarance+t.ccs+t.hbl+t.telephone+t.med_adv+t.festival_adv+t.tf+t.med_ins+t.comp_loan+ t.ptax + t.itax + t.gpf +t.epf + t.other_deduction) as net_amount"
            );

            $where  = array(

                "m.emp_code = t.emp_no" =>  NULL,

                "t.sal_month"           =>  $this->input->post('sal_month'),

                "t.sal_year"            =>  $this->input->post('year'),

                "m.emp_catg"            =>  $this->input->post('category'),

                "m.emp_status"          =>  'A'

            );

            $statement['statement'] =   $this->Report_Process->f_get_particulars("md_employee m, td_pay_slip t", $select, $where, 0);
            $statement['months']    =   $this->Report_Process->f_get_particulars("md_month", NULL, array("id" =>  $this->input->post('sal_month')), 1);
            $this->load->view('post_login/payroll_main');

            $this->load->view("reports/statement", $statement);

            $this->load->view('post_login/footer');

        }

        else {

            //Month List
            $statement['month_list'] =   $this->Report_Process->f_get_particulars("md_month",NULL, NULL, 0);

            //Category List
            $statement['category']   =   $this->Report_Process->f_get_particulars("md_category", NULL, array('category_code IN (1,2,3)' => NULL), 0);

            $this->load->view('post_login/payroll_main');

            $this->load->view("reports/statement", $statement);

            $this->load->view('post_login/footer');

        }

    }
 //Total Deduction Report

 public function totaldeduction () {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $totaldeduction['total_deduct'] =   $this->Report_Process->f_get_totaldeduction($this->input->post('from_date'), $this->input->post('to_date'));
        //Current Year
        $totaldeduction['year']  =   $this->Report_Process->f_get_particulars("md_parameters", array('param_value'), array('sl_no' => 15), 1);
       

        $this->load->view('post_login/payroll_main');

        $this->load->view("reports/totaldeduction", $totaldeduction);

        $this->load->view('post_login/footer');

    }

    else{

        //Month List
        $totaldeduction['month_list'] =   $this->Report_Process->f_get_particulars("md_month",NULL, NULL, 0);

        //For Current Date
        $totaldeduction['sys_date']   =   $_SESSION['sys_date'];

        $this->load->view('post_login/payroll_main');

        $this->load->view("reports/totaldeduction", $totaldeduction);

        $this->load->view('post_login/footer');

    }

}

    public function payslipreport() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            //Payslip
            $empno     =  $this->input->post('emp_cd');
            $sal_month  = $this->input->post('sal_month');
            $sal_yr     = $this->input->post('year');

            $where  =   array(

                "emp_no"            =>  $this->input->post('emp_cd'),
                "sal_month"         =>  $this->input->post('sal_month'),
                "sal_year"          =>  $this->input->post('year'),
                "approval_status"   =>  'A' );

            $payslip['emp_dtls']    =   $this->Report_Process->f_get_particulars("md_employee", NULL, array("emp_code" =>  $this->input->post('emp_cd')), 1);

            $payslip['payslip_dtls']    =   $this->Report_Process->f_get_emp_dtls($empno, $sal_month,$sal_yr);
            // $payslip['payslip_dtls']=   $this->Report_Process->f_get_particulars("td_pay_slip", NULL, $where, 1);
            $payslip['months']    =   $this->Report_Process->f_get_particulars("md_month", NULL, array("id" =>  $this->input->post('sal_month')), 1);

            $this->load->view('post_login/payroll_main');

            $this->load->view("reports/payslip", $payslip);

            $this->load->view('post_login/footer');

        }
        
        else {

            //Month List
            $payslip['month_list'] =   $this->Report_Process->f_get_particulars("md_month",NULL, NULL, 0);
            //For Current Date
            $payslip['sys_date']   =   $_SESSION['sys_date'];

            //Employee List
            unset($select);
            $select = array ("emp_code", "emp_name");
            $payslip['emp_list']   =   $this->Report_Process->f_get_particulars("md_employee", $select, array("emp_catg IN (1,2,3)" => NULL,'1 order by emp_name'=>NULL), 0);

            $this->load->view('post_login/payroll_main');
            $this->load->view("reports/payslip", $payslip);
            $this->load->view('post_login/footer');
            
        }

    }

    public function bankadvise() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
    
            $select     =   array("emp_code");
    
            $where      =   array(
    
                "emp_catg"  =>  $this->input->post('category')
    
            );
    
            $emp_id     =   $this->Report_Process->f_get_particulars("md_employee", $select, $where, 0);
    
            //Temp variable for emp_list
            $eid_list   =   [];
    
            for($i = 0; $i < count($emp_id); $i++) {
    
                array_push($eid_list, $emp_id[$i]->emp_code);
    
            }
    
    
            //List of Salary Category wise
            unset($where);
            $where = array (
                "m.emp_code = t.emp_no" =>  NULL,
                "t.sal_month"     =>  $this->input->post('sal_month'),
    
                "t.sal_year"      =>  $this->input->post('year')
    
            );
    
           // $salary['list']               =   $this->Report_Process->f_get_particulars_in("md_employee m,td_pay_slip t", $eid_list, $where);
    
            // $salary['attendance_dtls']    =   $this->Report_Process->f_get_attendance();
    
            //Employee Group Count
            unset($select);
            unset($where);
    
            $select =   array(
    
                "m.emp_code",  "COUNT(m.emp_code) count","m.emp_name"
    
            );
    
            $where  =   array(
    
                "t.sal_month"     =>  $this->input->post('sal_month'),
    
                "t.sal_year = '".$this->input->post('year')."' GROUP BY m.emp_code,m.emp_name"      =>  NULL
    
            );
    
            $salary['count']              =   $this->Report_Process->f_get_particulars("md_employee m,td_pay_slip t", $select, $where, 0);
            // f_get_particulars("md_employee m, td_pay_slip t", $select, $where, 0);
            $salary['list']               =   $this->Report_Process->f_get_gov_ben_salary_list($this->input->post('year'),$this->input->post('sal_month'));
            
            $this->load->view('post_login/payroll_main');
    
            $this->load->view("reports/salary_bank_advice", $salary);
    
            $this->load->view('post_login/footer');
    
        }
    
        else {
    
            //Month List
            $salary['month_list'] =   $this->Report_Process->f_get_particulars("md_month",NULL, NULL, 0);
    
            //For Current Date
            $salary['sys_date']   =   $_SESSION['sys_date'];
    
            //Category List
            $salary['category']   =   $this->Report_Process->f_get_particulars("md_category", NULL, array('category_code IN (1,2,3)' => NULL), 0);
    
            $this->load->view('post_login/payroll_main');
    
            $this->load->view("reports/salary_bank_advice", $salary);
    
            $this->load->view('post_login/footer');
    
        }
    
    }

    public function pfledger() {

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            //Payslip
            $empno     =  $this->input->post('emp_cd');
         
            $sal_yr     = $this->input->post('year');

            

            $payslip['emp_dtls']    =   $this->Report_Process->f_get_particulars("md_employee", NULL, array("emp_code" =>  $this->input->post('emp_cd')), 1);

            $payslip['pf_dtls']    =   $this->Report_Process->f_get_emp_pf_dtls($empno);

            $this->load->view('post_login/payroll_main');

            $this->load->view("reports/pfledger", $payslip);

            $this->load->view('post_login/footer');

        }
        
        else {

            //Month List
            $payslip['month_list'] =   $this->Report_Process->f_get_particulars("md_month",NULL, NULL, 0);
            //For Current Date
            $payslip['sys_date']   =   $_SESSION['sys_date'];

            //Employee List
            unset($select);
            $select = array ("emp_code", "emp_name");
            $payslip['emp_list']   =   $this->Report_Process->f_get_particulars("md_employee", $select, array("emp_catg IN (1,2,3)" => NULL,'1 order by emp_name'=>NULL), 0);

            $this->load->view('post_login/payroll_main');
            $this->load->view("reports/pfledger", $payslip);
            $this->load->view('post_login/footer');
            
        }

    }
    

}
?>
		
		 