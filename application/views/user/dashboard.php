  <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
             <div class="row">
                <div class="col-3">
                  <h3>User List</h3>
                  <?php if($this->session->flashdata('msg')){ ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('msg'); ?>
               </div>
               <?php } ?>
               <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
               </div>
               <?php } ?>
                </div>
                <!-- <div class="col-2">
                    <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="active_status" id="active_status" value="A" checked>
                                Active
                            </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="active_status" id="active_status" value="R" >
                            Retired
                           </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="active_status" id="active_status" value="S" >
                            Suspended
                            </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="active_status" id="active_status" value="RG" >
                            Resigned
                            </label>
                    </div>
                </div> -->
                
                <div class="col-8 addBtnSec">
                <small><a href="<?php echo site_url("admin/user_add");?>" class="btn btn-primary">Add</a></small>
                </div>
             </div>
             <br>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive" id='ajaxl'>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th>Sl. No.</th>
                          <th>Name</th>
                          <!-- <th>Employee code</th> -->
                          <!-- <th>Mobile NO</th> -->
                          <th>User Type</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                    
                    if($user_dtls) {

                      $i = 0;
                          foreach($user_dtls as $u_dtls) {

                    ?>
                         <tr>

                          <td><?php echo ++$i; ?></td>
                          <td><?php echo $u_dtls->user_name; ?></td>
                     
                          <td><?php if($u_dtls->user_type == 'A'){
                            echo '<span class="badge badge-success">Admin</span>';
                          }
                          elseif ($u_dtls->user_type == 'M') {
                            echo '<span class="badge badge-warning">Manager</span>';
                          }elseif ($u_dtls->user_type == 'D') {
                            echo '<span class="badge badge-warning">Accountant</span>';
                          }elseif ($u_dtls->user_type == 'U') {
                            echo '<span class="badge badge-dark">General User</span>';
                          }elseif ($u_dtls->user_type == 'C') {
                            echo '<span class="badge badge-light">Accountant</span>';
                          }
                            ?>
                          </td>
                         <!-- <td><?php echo $u_dtls->user_id; ?></td> -->

                       <td>
                          <!-- <a href="admins/user_edit?user_id=<?php //echo $u_dtls->user_id; ?>" 
                              data-toggle="tooltip"
                              data-placement="bottom" title="Edit"> 
                           <i class="fa fa-edit fa-2x" style="color: #007bff"></i>-->
                    </a>
                </td>
             </tr>
                    <?php
                            
                            }
                        }
                        else {
                            echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";
                        }
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>   
        <script>
        $(document).ready( function (){

          $('.delete').click(function () {

              var id = $(this).attr('id');

              var result = confirm("Do you really want to delete this record?");

              if(result) {

                  window.location = "<?php echo site_url('dstf?empcd="+id+"');?>";

              }
              
          });

        });
   
    $(document).ready(function() {

        $('.confirm-div').hide();

        <?php if($this->session->flashdata('msg')){ ?>

        $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

        <?php } ?>

    });

    //$("#active_status").change(function(){
    $('input[type=radio][name=active_status]').on('change', function(e){ 
      $('#ajaxl').html('');
      $.ajax({url: "<?=base_url()?>index.php/admin/ajaxemplist",
         type: "POST",
         data: {active_status : $(this).val()},
         success: function(result){
          $('#ajaxl').html(result);
          $('#order-listing').DataTable({ 
                      "destroy": true, //use for reinitialize datatable
                   });
         }
         });
    });
    
</script>