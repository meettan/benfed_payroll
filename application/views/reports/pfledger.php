<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');
        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');
        WindowObject.document.writeln('@media print {.center { text-align: center;} .underline { text-decoration: underline; } '
        +'p { display:inline; } .left { margin-left: 315px; text-align="left" display: inline; } '
        +'.right { margin-right: 375px; display: inline; } td.left_algn { text-align: left; } td.right_algn { text-align: right; } '
        +'.t2 td, th { border: 1px solid black; } td.hight { hight: 15px; } table.width { width: 100%; } table.noborder { border: 0px solid black; } '
        +'th.noborder { border: 0px solid black; } .border { border: 1px solid black; } .bottom { position: absolute;; bottom: 5px; width: 100%; }'
    +'.col-1{max-width:100%; float:none;text-align: left; text-align: center;} .col-10{max-width:100%; float:none;}'
+'.printHead h3{font-size:18px; margin: 0 0 10px 0; padding: 0; line-height: 19px;} .printHead h4{font-size:16px; margin: 0 0 10px 0; padding: 0; line-height: 17px;}'
+'table.dataTable tbody tr td{font-family: arial; font-size:15px;} table.dataTable tbody tr td{border-top:1px solid #ccc; padding:6px;}'
+'table.dataTable tbody tr:last-child td{border-bottom:1px solid #ccc; padding:6px;}'

+'table.tablePrint{margin-bottom:20px;} table.tablePrint thead tr th{background:#000; color:#fff;}'
+'table.tablePrint thead tr th{font-family: arial; font-size:15px; border:none;} table.tablePrint thead tr th{border:none; padding:6px;text-align: left; }'
+'table.tablePrint thead th:last-child td{padding:6px; border:none;} .table_responsive_print{padding-top: 20px;}'

+'table.tablePrint tbody tr td{font-family: arial; font-size:15px;} table.tablePrint tbody tr td{border:none; border:1px solid #ccc; padding:6px;text-align: left; }'
+'table.tablePrint tbody tr:last-child td{border:none; border:1px solid #ccc; padding:6px;}'

    +'}</style>');
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
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($pf_dtls)) {
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
          <div class="card" >
            <div class="card-body" id='divToPrint'>
            <div class="row">
            <div class="col-1 logoPrint"><a href="javascript:void()"><img src="<?=base_url()?>assets/images/benfed.png" alt="logo"/></a></div>
            <div class="col-10">
                <div style="text-align:center;" class="printHead">
                <h3>The West Bengal State Co Operative Marketing Federation Ltd.</h3>
                <h4>Southend Conclave, 3rd Floor, 1582, Rajdanga Main Rd, Kasba, Kolkata-700107</h4>
                <h4>EMPLOYEES PROVIDENT FUND ACCOUNT LEDGER </h4>
                <h4>Financial Year :<?php echo $this->input->post('syear').'-'.$this->input->post('eyear'); ?></h4>
                </div> 
            </div>    
            </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive table_responsive_print">
                    <table id="order-listing" class="table" width="100%" border="0" cellspacing="0" cellpadding="0">
                      <!-- <thead>
                      <tr>
                            <th class="noborder" width="25%"></th>
                            <th class="noborder" width="1%"></th>
                            <th class="noborder" width="25%"></th>
                            <th class="noborder" width="1%"></th>
                            <th class="noborder" width="25%"></th>
                            <th class="noborder" width="1%"></th>
                            <th class="noborder" width="25%"></th>
                        </tr>
                      </thead> -->
                      <tbody>
                     
                      <tr>
                        <td><b>NAME OF EMPLOYEE</b></td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php echo $emp_dtls->emp_name; ?></td>
                        <td></td>
                        <td ><b>ACCOUNT/ID NO</b>	</td>
                        <!-- <td></td> -->
                        <td class="left_algn">:</td>
                        <td><?php echo $emp_dtls->pf_ac_no; ?></td>
                      </tr>
                      <tr>
                        <td><b>DATE OF JOINING</b></td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php if(($emp_dtls->join_dt != "0000-00-00") && ($emp_dtls->join_dt != NULL)){ echo date('d-m-Y', strtotime($emp_dtls->join_dt)); } ?></td>
                        <td></td>
                        <td><b>DATE OF BIRTH</b></td>
                        <td class="left_algn">:</td>
                        <td class="left_algn"><?php if(($emp_dtls->dob != "0000-00-00") && ($emp_dtls->dob != NULL)){ echo date('d-m-Y', strtotime($emp_dtls->dob)); } ?></td>
                        
                    
                      </tr>
                      <tr>
                        <td><b>UAN NO</b>	</td>
                            <td class="left_algn">:</td>
                            <td class="left_algn"><?php echo $emp_dtls->UAN; ?></td>
                            <td></td>
                            <td><b>FINANCIAL YEAR</b></td>
                            <td class="left_algn">:</td>
                            <td><?php echo $this->input->post('syear').'-'.$this->input->post('eyear'); ?></td>

                        </tr>
                        
                      </tbody>
                    </table>
                    <br>
                    <table class="width tablePrint" cellpadding="6" style="width:100%;" width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead style="background-color:#808080 !important">
                            <tr class="t2">
                                <th rowspan="3">WAGE MONTH</th>
                                <th rowspan="3">CONTRI BUTION MONTH</th>
                                <th rowspan="3">EPF WAGES (B.P +D.A)</th>
                                <th rowspan="3">EPS WAGES (15000)</th>
                                <th colspan="3" style="text-align:center">DEPOSITED</th>
                               
                            </tr>
                            <tr class="t2">
                                <th>EMPLOYEE SHARE</th>
                                <th colspan="2">EMPLOYER SHARE</th>
                            </tr>
                            <tr class="t2">
                                <th >EPF</th>
                                <th >EPF</th>
                                <th >EPS</th>
                            </tr>

                        </thead>

                        <tbody> 
                        <?php  $tot_epf1 = 0.00; $tot_epf2 = 0.00;$tot_emp_epf = 0.00;$tot_ey_epf = 0.00;$tot_epfs =0.00;
                        
                        foreach($pf_dtls as $pf)  {
                            
                            $tot_epf1 +=$pf->EPF_WAGES;
                            $tot_epf2 +=$pf->EPF_WAGE;
                            $tot_emp_epf +=$pf->employees_EPF;
                            $tot_ey_epf +=$pf->EMPLOYER_EPF;
                            $tot_epfs +=$pf->employees_EPF- $pf->EMPLOYER_EPF;

                            
                            ?>

                        <tr>
                            <td><?=$pf->WAGE_MONTH?></td>
                            <td><?=$pf->CONTRIBUTION_MONTH?> <?=$pf->CONTRIBUTION_YR?></td>
                            <td><?=$pf->EPF_WAGES?></td>
                            <td><?=number_format($pf->EPF_WAGE,2)?></td>
                            <td><?=$pf->employees_EPF?></td>
                            <td><?=$pf->EMPLOYER_EPF?></td>
                            <td><?=$pf->EMPLOYER_epfs?></td>
                        </tr>
                            <?php } ?>
                            
                           
                            
                            <tr class="t2">

                                <td colspan="2"><b>Total </b></td>
                                <td class="right_algn"><b><?=number_format($tot_epf1,2)?></b></td>
                                <td class="right_algn"><b><?=number_format($tot_epf2,2)?></b></td>
                                <td class="right_algn"><b><?=number_format($tot_emp_epf,2)?></b></td>
                                <td class="right_algn"><b><?=number_format($tot_ey_epf,2)?></b></td>
                                <td class="right_algn"><b><?=number_format($tot_epfs,2)?></b></td>

                            </tr>
                          
                            
                        </tbody>

                    </table>
                    <div>
                       <!-- <p style="display: inline;">Amount (<small>in words</small>):
                       <b>   <?php //echo getIndianCurrency($tot_er - $tot_dd);?></p></b> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-12" style="text-align: center;"><button type="button" class='btn btn-primary' id='btn' value='Print' onclick='printDiv();'>Print</button></div>
           
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
              <h3>Pf Ledger Report</h3>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" id="form" action="<?php echo site_url("reports/pfledger");?>" >
                            <div class="form-group">
                                <div class="row">
                                  
                                    <!-- <div class="col-3">
                                        <label for="exampleInputName1">Month:</label>
                                        <select class="form-control" name="sal_month" id="sal_month" required>
                                        <option value="">Select Month</option>
                                        <?php //foreach($month_list as $m_list) {?>
                                            <option value="<?php //echo $m_list->id ?>" ><?php //echo $m_list->month_name; ?></option>

                                        <?php
                                        // }
                                        ?>
                                        </select> 
                                    </div> -->
                                    <div class="col-4">
                                        <label for="exampleInputName1">Start Year:</label>
                                        <input type="text" class="form-control" name="syear" id="year" required
                                        value="<?php echo date('Y');?>"/>
                                    </div>
                                    <div class="col-4">
                                        <label for="exampleInputName1">End Year:</label>
                                        <input type="text" class="form-control" name="eyear" id="year" required
                                        value="<?php echo date('Y',strtotime('+1 year'));?>"/>
                                    </div>
                                    <div class="col-4">
                                `      <label for="exampleInputName1">Emplyee Name:</label>
                                        <select class="form-control required" name="emp_cd" id="emp_cd" required>
                                        <option value="">Select Employee</option>
                                        <?php  

                                            if($emp_list) {
                                            foreach ($emp_list as $e_list) {
                                        ?>        
                                            <option value='<?php echo $e_list->emp_code ?>'>
                                            <?php echo $e_list->emp_name; ?></option>
                                        <?php
                                                    }
                                                }    ?>
                                        </select>
                                    </div>`
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
      
