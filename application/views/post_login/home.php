<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-6 grid-margin">
              <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Quick Link</p>
                      <!-- <div class="d-flex flex-wrap align-items-baseline">
                          <h2 class="mr-3">33,956</h2>
                          <i class="mdi mdi-arrow-up mr-1 text-danger"></i><span><p class="mb-0 text-danger font-weight-medium">+2.12%</p></span>
                      </div>
                      <p class="mb-0 text-muted">Total users world wide</p> -->
                      <ul class="listCustom">
                        <li><a href="<?php echo site_url("stfemp");?>">Employee</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/dept">Department</a></li>
                        <li><a href="<?php echo site_url("slrydtl");?>">Earnings</a></li>
                        <li><a href="<?php echo site_url("slryded");?>">Deductions</a></li>
                        <li><a href="<?php echo site_url('reports/payslipreport'); ?>">Pay Slip</a></li>
                        <li><a href="<?php echo site_url('reports/paystatementreport'); ?>">Salary Statement</a></li>
                        

                      </ul>
                    </div>
                    <!-- <canvas id="users-chart"></canvas> -->
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Active Employee</p>
                      <div class="d-flex flex-wrap align-items-baseline">
                        <h2 class="mr-3"><?=$tot_employee->tot_emp?></h2>
                        <!-- <i class="mdi mdi-arrow-up mr-1 text-success"></i><span><p class="mb-0 text-success font-weight-medium">+9.12%</p></span>                           -->
                      </div>
                      <p class="mb-0 text-muted">Total Employee</p>
                    </div>
                    <canvas id="projects-chart"></canvas>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Earning & Deduction</p>
                      <p class="mb-2 text-success">Salary paid upto <strong><?=$month_name->month_name?> <?=$generation_dtls->sal_year?> </strong></p>
                      <div class="row mt-4">
                        <div class="col-md-6 stretch-card">
                          <div class="row d-flex align-items-center">
                            <div class="col-6">
                              <div id="offlineProgress"></div>                              
                            </div>
                            <div class="col-6 pl-0">
                              <p class="mb-0">Earning</p>
                              <h4>&#8377; <?=$tot_ear_deduction->tot_eer?></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 stretch-card mt-4 mt-md-0">
                          <div class="row d-flex align-items-center">
                            <div class="col-6">
                              <div id="onlineProgress"></div>                              
                            </div>
                            <div class="col-6 pl-0">
                              <p class="mb-0">Deduction</p>
                              <h4>&#8377; <?=$tot_ear_deduction->tot_ded?></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Professional Tax Slab</p>
                  <!-- <p class="text-muted">Audience to which the users belonged while on the current date Audience to which the users belonged while on the current date Audience to which the users belonged while on the current date </p> -->
                  <div class="d-flex flex-wrap mb-4 mt-4 pb-4">
                    <!-- <div class="mr-4 mr-md-5">
                      <p class="mb-0">From Rs.0.00</p><p class="mb-0">UPTO Rs.10000</p>
                      <h4>13,956</h4>
                    </div>
                    <div class="mr-4 mr-md-5">
                      <p class="mb-0">Returns</p>
                      <h4>27,219</h4>
                    </div>
                    <div class="mr-4 mr-md-5">
                      <p class="mb-0">Queries</p>
                      <h4>03,386</h4>
                    </div>
                    <div class="mr-4 mr-md-5">
                      <p class="mb-0">Invoices</p>
                      <h4>04,739</h4>
                    </div> -->

                    <div class="table-responsive">
                    <table class="table tickets-table mb-2">
                      <thead>
                        <tr>
                          <th class="text-muted">SL.No.</th>
                        <th class="text-muted">From</th>
                        <th class="text-muted">UPTO</th>
                        <th class="text-muted">Tax Amount</th>
                      </tr></thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>
                            <p class="mb-0">0.00</p>
                            <!-- <p class="text-muted mb-0">Connecticut</p> -->
                          </td>
                          <td>
                            <p class="mb-0">10000.00</p>
                            <!-- <p class="text-muted mb-0">9:30 am</p> -->
                          </td>
                          <td>
                            <p class="mb-0">0.00</p>
                            <!-- <p class="text-muted mb-0">View on map</p> -->
                          </td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>
                            <p class="mb-0">10001.00</p>
                            <!-- <p class="text-muted mb-0">Connecticut</p> -->
                          </td>
                          <td>
                            <p class="mb-0">15000.00</p>
                            <!-- <p class="text-muted mb-0">9:30 am</p> -->
                          </td>
                          <td>
                            <p class="mb-0">110.00</p>
                            <!-- <p class="text-muted mb-0">View on map</p> -->
                          </td>
                        </tr>

                        <tr>
                          <td>3</td>
                          <td>
                            <p class="mb-0">15001.00</p>
                            <!-- <p class="text-muted mb-0">Connecticut</p> -->
                          </td>
                          <td>
                            <p class="mb-0">25000.00</p>
                            <!-- <p class="text-muted mb-0">9:30 am</p> -->
                          </td>
                          <td>
                            <p class="mb-0">130.00</p>
                            <!-- <p class="text-muted mb-0">View on map</p> -->
                          </td>
                        </tr>

                        <tr>
                          <td>4</td>
                          <td>
                            <p class="mb-0">25001.00</p>
                            <!-- <p class="text-muted mb-0">Connecticut</p> -->
                          </td>
                          <td>
                            <p class="mb-0">40000.00</p>
                            <!-- <p class="text-muted mb-0">9:30 am</p> -->
                          </td>
                          <td>
                            <p class="mb-0">150.00</p>
                            <!-- <p class="text-muted mb-0">View on map</p> -->
                          </td>
                        </tr>

                          <tr>
                          <td>5</td>
                          <td>
                            <p class="mb-0">40001.00</p>
                            <!-- <p class="text-muted mb-0">Connecticut</p> -->
                          </td>
                          <td>
                            <p class="mb-0">99999999.00</p>
                            <!-- <p class="text-muted mb-0">9:30 am</p> -->
                          </td>
                          <td>
                            <p class="mb-0">200.00</p>
                            <!-- <p class="text-muted mb-0">View on map</p> -->
                          </td>
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <!-- <canvas id="total-sales-chart"></canvas> -->
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-success">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-success icon-rounded-lg">
                      <i class="mdi mdi-arrow-top-right"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Sales</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$508</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-info">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-info icon-rounded-lg">
                      <i class="mdi mdi-basket"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Purchases</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$387</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-danger">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-danger icon-rounded-lg">
                      <i class="mdi mdi-chart-donut-variant"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Orders</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$161</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-warning">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-warning icon-rounded-lg">
                      <i class="mdi mdi-chart-multiline"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Growth</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1">$231</h3>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-md-end flex-wrap">
                    <p class="card-title">Tickets</p>
                    <div class="dropdown mb-3 mb-md-0">
                      <button class="btn btn-sm btn-outline-light dropdown-toggle text-dark" type="button" id="dropdownMenuDate1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        2018
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate1">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table tickets-table mb-2">
                      <thead>
                        <th class="text-muted pl-0">
                          Name
                        </th>
                        <th></th>
                        <th class="text-muted">
                          Date
                        </th>
                        <th class="text-muted">
                          Projects
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="pl-0">
                            <div class="icon-rounded-primary icon-rounded-md">
                              <h4 class="font-weight-medium">AL</h4>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0">Alta Lucas</p>
                            <p class="text-muted mb-0">Connecticut</p>
                          </td>
                          <td>
                            <p class="mb-0">31 Aug 2018</p>
                            <p class="text-muted mb-0">9:30 am</p>
                          </td>
                          <td>
                            <p class="mb-0">6770 Verner Burgs</p>
                            <p class="text-muted mb-0">View on map</p>
                          </td>
                          <td class="pr-0">
                            <i class="mdi mdi-dots-horizontal icon-sm cursor-pointer"></i>
                          </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                            <div class="icon-rounded-info icon-rounded-md">
                              <h4 class="font-weight-medium">TS</h4>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0">Teresa Shaw</p>
                            <p class="text-muted mb-0">Florida</p>
                          </td>
                          <td>
                            <p class="mb-0">13 May 2018</p>
                            <p class="text-muted mb-0">10:30 am</p>
                          </td>
                          <td>
                            <p class="mb-0">1300 Gideon Divide Apt. 400</p>
                            <p class="text-muted mb-0">Start session</p>
                          </td>
                          <td class="pr-0">
                            <i class="mdi mdi-dots-horizontal icon-sm cursor-pointer"></i>
                          </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                            <div class="icon-rounded-danger icon-rounded-md">
                              <h4 class="font-weight-medium">RU</h4>
                            </div>
                          </td>
                          <td>
                              <p class="mb-0">Rosa Underwood</p>
                              <p class="text-muted mb-0">North Dakota</p>
                          </td>
                          <td>
                            <p class="mb-0">02 Jan 2018</p>
                            <p class="text-muted mb-0">11:00 am</p>
                          </td>
                          <td>
                            <p class="mb-0">9576 Rempel Extension</p>
                            <p class="text-muted mb-0">End session</p>
                          </td>
                          <td class="pr-0">
                            <i class="mdi mdi-dots-horizontal icon-sm cursor-pointer"></i>
                          </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                            <div class="icon-rounded-warning icon-rounded-md">
                              <h4 class="font-weight-medium">VR</h4>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0">Vilson Rowa</p>
                            <p class="text-muted mb-0">Densar</p>
                          </td>
                          <td>
                            <p class="mb-0">05 Nov 2018</p>
                            <p class="text-muted mb-0">02:30 am</p>
                          </td>
                          <td>
                            <p class="mb-0">1072 Orion Expansion</p>
                            <p class="text-muted mb-0">On Way</p>
                          </td>
                          <td class="pr-0">
                            <i class="mdi mdi-dots-horizontal icon-sm cursor-pointer"></i>
                          </td>
                        </tr>
                        <tr>
                          <td class="pl-0">
                            <div class="icon-rounded-info icon-rounded-md">
                              <h4 class="font-weight-medium">TS</h4>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0">Teresa Shaw</p>
                            <p class="text-muted mb-0">Florida</p>
                          </td>
                          <td>
                            <p class="mb-0">13 May 2018</p>
                            <p class="text-muted mb-0">10:30 am</p>
                          </td>
                          <td>
                            <p class="mb-0">1300 Gideon Divide Apt. 400</p>
                            <p class="text-muted mb-0">Start session</p>
                          </td>
                          <td class="pr-0">
                            <i class="mdi mdi-dots-horizontal icon-sm cursor-pointer"></i>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>  
              </div>
            </div>
            <div class="col-xl-4 grid-margin stretch-card">
              <div class="card">
								<div class="card-body">
									<p class="card-title">Updates</p>
									<ul class="bullet-line-list mt-4">
										<li>
											<h6>User confirmation</h6>
											<p class="mt-2">Tonight's the night. And it's going to happen again and again. It has to happen. I'm thinking two circus clowns dancing. </p>
											<p class="text-muted mb-4">
												<i class="mdi mdi-clock-outline"></i>
												7 months ago.
											</p>
										</li>
										<li>
											<h6>Continuous evaluation</h6>
											<p class="mt-2">And it's going to happen again and again. It has to happen. I'm thinking two circus clowns dancing. Tonight's the night.  </p>
											<p class="text-muted mb-4">
												<i class="mdi mdi-clock-outline"></i>
												7 months ago.
											</p>
										</li>
										<li>
											<h6>Promotion</h6>
											<p class="mt-2">It has to happen. I'm thinking two circus clowns dancing. Tonight's the night. </p>
											<p class="text-muted">
												<i class="mdi mdi-clock-outline"></i>
												7 months ago.
											</p>
										</li>
									</ul>
								</div>
							</div>
            </div>
          </div> -->
        </div>
        <!-- content-wrapper ends -->