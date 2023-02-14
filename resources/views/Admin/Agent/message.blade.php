@extends('layouts.base-form')
 @section('message')

</br>
<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-bottom-0">
										<h3 class="card-title">Contact Prospect</h3>
									</div>
									<div class="card-body">
										<div class="card-pay">
											<ul class="tabs-menu nav">
												<li class=""><a href="#tab20" class="active" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> SMS</a></li>
												<li><a href="#tab21" data-bs-toggle="tab" class=""><i class="fa fa-paypal"></i>  E-MAIL</a></li>
												<li><a href="#tab22" data-bs-toggle="tab" class=""><i class="fa fa-university"></i>  COURRIER</a></li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane active show" id="tab20">
													<div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert">Please Enter Valid Details</div>
													<div class="form-group">
														<a  href="javascript:void(0);" class="btn  btn-lg btn-primary">SMS INFORMATION</a>
													</div>
													<div class="form-group">
														<a  href="javascript:void(0);" class="btn  btn-lg btn-primary">SMS PROMESSE</a>
													</div>
													
													<a  href="javascript:void(0);" class="btn  btn-lg btn-primary">Confirm</a>
												</div>
												<div class="tab-pane" id="tab21">
													
												<a  href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-paypal"></i> MAIL INFORMAtion</a>
													
												</div>
												<div class="tab-pane" id="tab22">
														<a  href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-paypal"></i> Courrier</a>
													
												
												</div>
											</div>
										</div>
									</div>
								</div>
</div>

 @endsection