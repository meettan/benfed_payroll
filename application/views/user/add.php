<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h3>Employee Add</h3>
              <?php if($this->session->flashdata('msg')){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('msg'); ?>
               </div>
               <?php } ?>
             
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" id="form" action="<?php echo site_url("admin/user_add");?>" >
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="exampleInputName1">User ID:<span class="requiredfield">*</span></label>
                                    <input type="text" name="user_id" class="form-control" id="user_id" value="" required/>
                                    </div>
                                    <div class="col-6">
                                    <label for="exampleInputName1">Employee Name:<span class="requiredfield">*</span></label>
                                    <input type="text" name="user_name" class="form-control" id="user_name" value="" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                <div class="col-6">
                                    <label for="exampleInputName1">USer Type:</label>
                                        <select class="form-control required" name="user_type" id="user_type">
                                           <option value="">Select</option>
                                           <option value="A">Admin</option>
                                           <option value="M">Manager</option>
                                        </select>   
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputName1">District:</label>
                                        <select
                                            class="form-control required"
                                            name="branch_id"
                                            id="branch_id">

                                        <option value="">Select District</option>

                                        <?php foreach($dist_dtls as $dist) {
                                        ?>
                                            <option value="<?php echo $dist->district_code ?>" >
                                                    <?php echo $dist->district_name; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>   
                                    </div>
                                </div>
                        </div>
           
          
            <div class="form-group">
                                   <div class="col-6">
                                    <label for="exampleInputName1">Password By default 123:<span class="requiredfield">*</span></label>
                                   
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

    $('#dob').change(function(){
    
        var now = new Date($('#dob').val());
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var year  = now.getFullYear()+60;
        var rtday = year+"-"+(month)+"-"+(day) ;
        $('#ret_dt').val(rtday);

    })

    $("#emp_code").change(function(){
      $.ajax({url: "<?=base_url()?>index.php/Admin/check_empcode",
         type: "POST",
         data: {empcode : $(this).val()},
         success: function(result){
          if(result != 0){
           
            alert('Employee Code already exist');
            $("#emp_code").val('');
            document.getElementById('emp_code').style.borderColor = "red";
          }else{
            document.getElementById('emp_code').style.borderColor = "";
          }
        
      }});
});
    
</script>