 <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h3>Change Password</h3>
              <?php if($this->session->flashdata('success')){ ?>
              <div class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php } ?>
              
              <?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                </div>
              <?php } ?>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" id="form" action="<?php echo site_url("admin/change_passwoerd");?>" >
                           
                                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputName1">Old Password:</label>
                                <input class="form-control oldpass" type="password" name="oldpass" id="oldpass">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputName1">Password:</label>
                        <input class="form-control password" type="password" name="password" id="password">
                        <div class="input-group-addon">
                            <!-- <i class="fa fa-eye-slash" aria-hidden="true"></i> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputName1">Confirm Password:</label>
                        <input type="password" class="form-control required confirm_password" name="confirm_password" id="confirm_password" />
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
    $('#confirm_password').keyup(function() {
        var cpass = $(this).val();
        var pass = $('#password').val();
        var htmval = '<label id="confirm_password-error" class="error" for="confirm_password">Please enter the same password as above.</label>';

    })

</script>
