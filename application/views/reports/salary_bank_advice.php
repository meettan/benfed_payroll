<style>
    table {
        border-collapse: collapse;
    }

    .table{
        width: 236%;
        max-width: 250%;
        margin-bottom: 20px;
    }

    table, td, th {
        border: 1px solid #dddddd;

        padding: 6px;
        font-size: 14px;
        text-transform:capitalize !important;
    }

    th {
        font-weight:bold !important;
        text-align: center;

    }

    tr:hover {background-color: #f5f5f5;}

</style>
<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          .table{ width: 236%; max-width: 250%; margin-bottom: 20px; } table { border-collapse: collapse; font-size: 14px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 10px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" ) {

        $bp = $gp =  $gross = $pf =$ptax = $tot_deduct = $net =$tf=$gpf=$epf=$comploan=
        
        $basic = $da  =  $ir = $hra = $ma = $oa = $ccs = $ins = $tf=$hbl=$tel=$med_adv=$med_ins=

       $oth_ded= $comp_loan= $fa = $lic  =  $itx = $pa = 0;$tot_earning = 0;$earning  = 0;   $deduction = 0; 
            // function getIndianCurrency($number)
            // {
            //     $decimal = round($number - ($no = floor($number)), 2) * 100;
            //     $hundred = null;
            //     $digits_length = strlen($no);
            //     $i = 0;
            //     $str = array();
            //     $words = array(0 => '', 1 => 'One', 2 => 'Two',
            //         3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            //         7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            //         10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            //         13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            //         16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            //         19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            //         40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            //         70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
            //     $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
            //     while( $i < $digits_length ) {
            //         $divider = ($i == 2) ? 10 : 100;
            //         $number = floor($no % $divider);
            //         $no = floor($no / $divider);
            //         $i += $divider == 10 ? 1 : 2;
            //         if ($number) {
            //             $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            //             $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            //             $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            //         } else $str[] = null;
            //     }
            //     $Rupees = implode('', array_reverse($str));
            //     $paise = ($decimal) ? "and " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
            //     return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise .' Only.';
            // }
?>  
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-1"><a href="javascript:void()"><img src="<?=base_url()?>assets/images/benfed.png" alt="logo"/></a></div>
            <div class="col-10"> 
                <div style="text-align:center;">
                    <h3>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h3>
                    <h4>Southend Conclave, 3rd Floor, 1582, Rajdanga Main Rd, Kasba, Kolkata-700073</h4>
                    <h4>SALARY FOR THE <?php if ($this->input->post('category') == 1) {
                        
                        echo "Govt.Regular Employee";
                    }

                    else if ($this->input->post('category') == 2){
                        echo "BENFED RAGULAR ";
                    } 

                    else if ($this->input->post('category') == 3) {
                        echo "Contractual Employee ";
                    }
                        else if ($this->input->post('category') == 4) {
                            echo "Daily Wages Employee ";

                    }?> EMPLOYEES FOR THE MONTH OF <?php echo MONTHS[$this->input->post('sal_month')].' '.$this->input->post('year') ; ?></h4>
                </div>
            </div>
        </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                  <table class="table table-bordered table-hover" style="width: 100%;">

<thead>
      

    </thead>

    <tbody> 
       
    
    <tr style="">
        
        <!-- <th width="15px">Sl No.</th> -->
        <th width="200px">Transaction_Ref_No</th>
        <th width="15px">Amount</th>
        <th width="15px">Value_Date</th>
        <th width="15px">Branch_Code</th>
        <th width="15px">Sender_Account_Type</th>
        <th width="15px">Remitter_Account_No</th>
        <th>Remitter_Name</th>
        <th width="15px">IFSC_Code</th>
        <th width="15px">Debit_Account</th>
        <th width="15px">Beneficiary_Account_type</th>
        <th width="15px">Bank_Account_Number</th>
        <th width="15px">Beneficiary_Name</th>
        <th width="15px">Remittance_Details</th>
        <th width="15px">Debit_Account_System</th>
        <th width="15px">Originator_Of_Remmittance</th>
        <th width="15px">EMAILMOBILENO</th>
   
    </tr>

</thead>

<tbody> 

    <?php 
      // print_r($list);die();
        if($list) {

            $temp_var = 0;
            $tempCount = 0;
            $i = 1;
        foreach($list as $s_list) {

            // $basic       +=  $s_list->basic_pay;
            // $da          +=  $s_list->da_amt;
            // $hra         +=  $s_list->hra_amt;
            // $ma          +=  $s_list->med_allow;
            // $oa          +=  $s_list->othr_allow;
            // $ins         +=  $s_list->insuarance;
            // $ccs         +=  $s_list->ccs;
            // $hbl         +=  $s_list->hbl;
            // $tel         +=  $s_list->telephone;
            // $med_adv     +=  $s_list->med_adv;
            // $fa          +=  $s_list->festival_adv;
            // $tf          +=  $s_list->tf;
            // $med_ins     +=  $s_list->med_ins;
            // $ptax        +=  $s_list->ptax;
            // $comploan    +=  $s_list->comp_loan;
            // $itx         +=  $s_list->itax;
            // $epf         +=  $s_list->epf;
            // $gpf         +=  $s_list->gpf;
            // $oth_ded     +=  $s_list->other_deduction;
            //$tot_deduct  +=  $s_list->tot_deduction;
        
    ?>        

    <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $s_list->net_pay; ?></td>
        <td><?php echo $s_list->Value_Date; ?></td>
        <td><?php echo $s_list->Branch_Code; ?></td>
        <td><?php echo $s_list->Sender_Account_Type; ?></td>
        <td><?php echo $s_list->Remitter_Account_No; ?></td>
        <td>The West Bengal State Co-operative Marketing Federation Ltd</td>
        <td><?php echo $s_list->ifsc; ?></td>
        <td><?php echo $s_list->Debit_Account; ?></td>
        <td><?php echo $s_list->Beneficiary_Account_type; ?></td>
        <td><?php echo $s_list->Bank_Account_Number; ?></td>
        <td><?php echo $s_list->emp_name; ?></td>
        <td><?php //echo $s_list->Remittance_Details; ?> Salary_<?php echo MONTHS[$this->input->post('sal_month')].' '.$this->input->post('year') ; ?></td>
        <td><?php echo $s_list->Debit_Account_System; ?></td>
        <td><?php echo $s_list->Originator_Of_Remmittance; ?></td>
        <td><?php echo $s_list->EMAILMOBILENO; ?></td>
    </tr>
<?php
            $tempCount++;$earning=0;$deduction=0;
        }

        ?>
            <!-- <tr>
                <td colspan="2">Total</td>
                <td><?php echo $basic; ?></td>
                <td><?php echo $da; ?></td>
                <td><?php echo $hra; ?></td>
                <td><?php echo $ma; ?></td>
                <td><?php echo $oa; ?></td>
                <td><?php echo $tot_earning; ?></td>
                <td><?php echo $ins; ?></td>
                <td><?php echo $ccs; ?></td>
                <td><?php echo $hbl; ?></td>
                <td><?php echo $tel; ?></td>
                <td><?php echo $med_adv; ?></td>
                <td><?php echo $fa; ?></td>
                <td><?php echo $tf; ?></td>
                <td><?php echo $med_ins; ?></td>
                <td><?php echo $ptax; ?></td>
                <td><?php echo $comploan; ?></td>
                <td><?php echo $itx; ?></td>
            </tr> -->

        <?php    

        
        }
        else {

            echo "<tr><td colspan='16' style='text-align:center;'>No data Found</td></tr>";

        }

    
?>

</tbody>

</table>
                    <br>
                    <div>

                    <button id="btnExport">EXPORT REPORT</button>

                    </div>
                    
                    <!-- <div  class="bottom">
                
                <p style="display: inline;">Prepared By</p>

                <p style="display: inline; margin-left: 8%;">Establishment, Sr. Asstt.</p>

                <p style="display: inline; margin-left: 8%;">Assistant Manager-II</p>

                <p style="display: inline; margin-left: 8%;">ARCS Attached to CONFED-WB</p>

                <p style="display: inline; margin-left: 8%;">Chief Executive Officer</p>

            </div> -->

            
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



<?php
    }

    else if($_SERVER['REQUEST_METHOD'] == 'GET') {

?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h3>Category wise Salary Bank advice</h3>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" id="form" action="<?php echo site_url("reports/bankadvise");?>" >
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="exampleInputName1">Transaction Date:</label>
                                    <input type="date"
                                            name="trans_dt"
                                            class="form-control"
                                            id="trans_dt"
                                            value="<?php echo $sys_date;?>"
                                            readonly />
                                    </div>
                                    <div class="col-6">
                                    <label for="exampleInputName1">Select Month:</label>
                                    <select
                                class="form-control required" required
                                name="sal_month"
                                id="sal_month"
                                >

                                <option value="">Select Month</option>

                                <?php foreach($month_list as $m_list) {?>

                                    <option value="<?php echo $m_list->id ?>" ><?php echo $m_list->month_name; ?></option>

                                <?php
                                }
                                ?>

                            </select>  

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="exampleInputName1">Input Year:</label>
                                     <input type="text" class="form-control" name="year" id="year" required
                                     value="<?php echo date('Y');?>" />
                  </div>
                    <!-- <div class="col-6">
                        <label for="exampleInputName1">Category:</label>
                        <select
                            class="form-control required"
                            name="category"
                            id="category">

                            <option value="">Select Category</option>

                            <?php foreach($category as $c_list) {?>

                                <option value="<?php echo $c_list->category_code; ?>" ><?php echo $c_list->category_type; ?></option>

                            <?php
                            }
                            ?>

                        </select>   
                        </div> -->
                    </div>
                    </div>
                    <input type="submit" class="btn btn-info" value="Proceed" />
                            <button class="btn btn-light">Cancel</button>
                        </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <?php

}
else {

    echo "<h1 style='text-align: center;'>No Data Found</h1>";

}

?>
      
