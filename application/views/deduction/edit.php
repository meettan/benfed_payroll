<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h3>Add Deductions</h3>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" id="form" action="<?php echo site_url("slrydeded");?>" >
                            <div class="form-group">
                                <div class="row">
                                <div class="col-4">
                                <label for="exampleInputName1">Employee code:</label>
                                <input type="text"
                                    name="emp_code"
                                    class="form-control required"
                                    id="emp_code"
                                    value="<?php echo $deduction_dtls->emp_code;?>"
                                    readonly
                                />
                                 </div>
                                    <div class="col-4">
                                    <label for="exampleInputName1">Name:</label>
                                    <input type="text"
                                        name="empname"
                                        class="form-control required"
                                        id="empname"
                                        value="<?php echo $deduction_dtls->emp_name;?>"
                                        readonly>
                                    </div>
                                    <div class="col-4">
                                    <label for="exampleInputName1">Category:</label>
                                    <input type = "text"
                                             class= "form-control"
                                                name = "category"
                                                id   = "category"
                                                value="<?php echo $deduction_dtls->category_type;?>"
                                                readonly
                                            />`

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="exampleInputName1">District:</label>
                                    <input type = "text"
                    class= "form-control"
                    name = "dist"
                    id   = "dist"
                    value="<?php echo $deduction_dtls->district_name;?>"
                    readonly
                />

                  </div>
                  <div class="col-6">
                        <label for="exampleInputName1">Salary Linked Insurance:</label>
                        <input type="text"
                    class= "form-control ded"
                    name = "sal_ins"
                    id   = "sal_ins"
                    value = "<?php echo $deduction_dtls->insuarance;?>"	
                />
                    </div>
                                <!-- <div class="col-6">
                                    <label for="exampleInputName1">Month:</label>
                                    <select class="form-control required" name="month" id="month" required>

                                        <option value="">Select Month</option>

                                        <?php //foreach($month_list as $m_list) { ?>

                                            <option value="<?php //echo $m_list->id ?>" ><?php //echo $m_list->month_name; ?></option>

                                        <?php
                                       // }
                                        ?>

                                    </select>
                                </div> -->
                                </div>
            </div>
            <!-- <div class="form-group">
                <div class="row">
                     <div class="col-6">
                        <label for="exampleInputName1">Year:</label>
                        <input type="text" class="form-control" name="year" id="year" 
                           value="<?php //echo $deduction_dtls->ded_yr;?>" readonly/>
                    </div> 
                   
                </div>
            </div> -->
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputName1">Co-operative Credit Society:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "ccs"
                            id   = "ccs"
                            value ="<?php echo $deduction_dtls->ccs;?>"
                        />

                    </div>
                    <div class="col-6">
                        <label for="exampleInputName1">House Building Loan:</label>
                        <input type = "text"
                                class= "form-control ded"
                                name = "hbl"
                                id   = "hbl"
                                value = "<?php echo $deduction_dtls->hbl;?>" 
                            />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputName1">Telephone:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "phone"
                            id   = "phone"
                            value = "<?php echo $deduction_dtls->telephone;?>"
                        />
                    </div>
                    <div class="col-6">
                        <label for="exampleInputName1">Medical Advance::</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "med_adv"
                            id   = "med_adv"
                            value = "<?php echo $deduction_dtls->med_adv;?>"
                        />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputName1">Festival Advance:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "fest_adv"
                            id   = "fest_adv"
                            value = "<?php echo $deduction_dtls->festival_adv;?>"
                        />
                    </div>
                    <div class="col-6">
                        <label for="exampleInputName1">Thrift Fund:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "tf"
                            id   = "tf"
                            value = "<?php echo $deduction_dtls->tf;?>"
                        />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputName1">Medical Insurance:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "med_ins"
                            id   = "med_ins"
                            value = "<?php echo $deduction_dtls->med_ins;?>"
                        />
                    </div>
                    <div class="col-6">
                        <label for="exampleInputName1">Computer Loan:</label>
                           <input type = "text"
                                class= "form-control ded"
                                name = "comp_loan"
                                id   = "comp_loan"
                                value = "<?php echo $deduction_dtls->comp_loan;?>"
                            />

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputName1">Itax:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "itax"
                            id   = "itax"
                            value = "<?php echo $deduction_dtls->itax;?>"
                        />
                    </div>
                    <div class="col-6">
                        <label for="exampleInputName1">GPF</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "gpf"
                            id   = "gpf"
                            value = "<?php echo $deduction_dtls->gpf;?>"
                        />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                        <label for="exampleInputName1">EPF:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "epf" readonly
                            id   = "epf"
                            value = "<?php //echo $deduction_dtls->epf;
                            if($deduction_dtls->emp_catg == 1){
                                echo $deduction_dtls->epf;
                            }else{
                                echo round(($earning_dtls->basic_pay+$earning_dtls->da_amt)*epfrate());
                            }
                            
                            
                            ?>"
                        />
                    </div>
                    <div class="col-4">
                        <label for="exampleInputName1">Other Deductions:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "other_ded"
                            id   = "other_ded"
                            value = "<?php echo $deduction_dtls->other_deduction;?>"
                        />
                    </div>
                    <div class="col-4">
                        <label for="exampleInputName1">PTax:</label>
                        <input type = "text"
                            class= "form-control ded"
                            name = "ptax"
                            id   = "ptax"
                            value = "<?php echo $deduction_dtls->ptax;?>"
                        />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                     <div class="col-4">
                        <label for="exampleInputName1">Total deduction:</label>
                        <input type = "text"
                            class= "form-control"
                            name = ""
                            id   = "tdud"  readonly
                            value = "<?php echo ($deduction_dtls->insuarance)+($deduction_dtls->ccs)+($deduction_dtls->hbl)+($deduction_dtls->telephone)+($deduction_dtls->med_adv)+($deduction_dtls->festival_adv)+($deduction_dtls->tf)+($deduction_dtls->med_ins)
           +($deduction_dtls->ptax)+($deduction_dtls->comp_loan)+($deduction_dtls->itax)+($deduction_dtls->epf)+($deduction_dtls->gpf)+($deduction_dtls->other_deduction); ?>"
                        />
                    </div>
                </div>
            </div>    
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <script>

$("#form").validate({
rules: {

    sal_yr: "required",

},
messages: {
    
    sal_yr: "Please enter valid input"
}

});


</script>

<script>

$(document).ready(function(){

    $('#month').change(function(){

        /*$('#category').val($(this).find(':selected').attr('catg'));

        $.get(
            '<?php echo site_url("Salary/f_emp_dtls"); ?>',
            {
                emp_code: $(this).val() 
            }
        )

        .done(function(data){
            var parseData = JSON.parse(data);
            //console.log(parseData );
            $('#dist').val(parseData.district_name) 

        });*/

        $.get( 

            '<?php echo site_url("Salary/f_sal_dtls");?>',
            { 

                emp_code: $("#emp_code").val()	
            }

        )

        .done(function(data){
            var parseData = JSON.parse(data);
            //console.log(parseData );
            var epfrate = "<?php echo epfrate() ?>";
            var basic = parseData.basic_pay; 
            var da    = parseData.da;
            var epf   = (basic + da)*epfrate;

            console.log(basic);

            console.log(da);

            console.log(epf.toFixed(2));

            $('#epf').val(epf.toFixed(2));

        });

    });

    $('.ded').change(function(){
    var sum = 0;
    $('.ded').each(function() {
        sum += parseFloat($(this).val());
    });
    //alert(sum);
    $('#tdud').val();
    $('#tdud').val(sum);
    })

});

</script>
