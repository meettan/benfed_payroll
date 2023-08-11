<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h3>Add Deductions  <span class="confirm-div" style="float:right; color:green;"></span></h3>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                       
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="exampleInputName1">INCOME TAX UPLOAD SAMPLE FILE</label>
                                    <a href="<?=base_url()?>index.php/salary/income_tax_files">Download</a>
                                    </div>
                                    <div class="col-6">
                                    <label for="exampleInputName1">COOPERATIVE INTEREST SAMPLE FILE</label>
                                    <a href="<?=base_url()?>index.php/salary/income_tax_files">Download</a>
                                    </div>
                                </div>
                            </div>
                            <form method="POST"  action="<?=base_url()?>index.php/salary/upload_files_data" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                    <label for="exampleInputName1">Please Selcet Type of upload file:</label>
                                              <select class="form-control" name="file_type" required>
                                                  <option value="0">Select File Type</option>
                                                  <option value="1">INCOME TAX FILE</option>
                                                  <option value="2">ECCS  FILE</option>
                                              </select>
                                    </div>
                                    <div class="col-4">
                                            <label for="exampleInputName1">Upload File:</label>
                                            <input type="file"
                                                class= "form-control" required
                                                name = "f_upload"
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

$(document).ready(function() {

$('.confirm-div').hide();

<?php if($this->session->flashdata('msg')){ ?>

$('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
<?php } ?>

});



</script>

