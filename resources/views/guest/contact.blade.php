@extends('guest.layout.app')
@section('content')
@include('guest.layout.navbar')
 <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>Contact</h2>
                        <ul>
                            <li><a href="index-2.html">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->
    <!-- Start Contact Area -->
    <section class="contact-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="contact-box">
                        <div class="icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="content">
                            <h4>Phone</h4>
                            <p><a href="#">+91 8200608406</a></p>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="contact-box">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>E-mail</h4>
                            <p><a href="mailto:info@skylinkinfotech.com">info@skylinkinfotech.com </a></p>
                            <p><a href="mailto:support@skylinkinfotech.com">support@skylinkinfotech.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="contact-box">
                        <div class="icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="content">
                            <h4>Location</h4>
                            <p>F-46, First Floor, Goldan Square, Radhanpur road Mehsana-2 384002</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-text">
                        <h3>Get in Touch</h3>
                        <p>Skylink is helping thousands of people and businesses create their online presence. If you have any questions about our services and want to get in touch with our team you can reach us on with the information beside or a submit the form and our team will get back to you at the earliest.</p>
                        <ul class="social-links">
                            <li><a href="https://www.facebook.com/codingflicindia"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/skylink"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/skylink/"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/skylink/"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="https://in.pinterest.com/skylink"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
							
						 							
                    <form method="post" action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="txtNameC" name="txtName" class="form-control" placeholder="Name" required />
                                    <input type="hidden" name="contact" value="Contact" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="txtPhoneC" name="txtPhone" class="form-control" placeholder="Phone " required maxlength="10" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" id="txtEmailC" name="txtEmail" class="form-control" placeholder="Your Email" />
                                </div>
                            </div>
                            <span id="validateformsC" class="text-danger text-center txt-contact-validate"></span>
                            <div class="text-center col-lg-12">
                                <div class="form-group">
                                    <input type="submit" name="submitbtnC" class="default-btn-one tw-mt-30" value="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
    </section>
    <!-- Start Contact Area -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="close-btn" aria-hidden="true"> &times; </span>
                </button>
                <div class="intro-form">
                    <h4>Let's Discuss More. Contact Us Now</h4>
                    <form method="post" action="#" id="contact-form">
                <div class="row">
  					        <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" id="txtNameR" name="txtName" class="form-control" placeholder="Name" required />
					  	<input type="hidden" name="Consult" value="Consult" />
                      </div>
  						      </div>
  						      <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" id="txtPhoneR" name="txtPhone" class="form-control" placeholder="Phone "required maxlength="10" />
                      </div>
					  </div>
  						      <div class="col-lg-12">
                      <div class="form-group">
                        <input type="email" id="txtEmailR" name="txtEmail" class="form-control" placeholder="Your Email"/>
                      </div>
  						      </div>
  						     
  						   
                                <span id="validateformsR" class="text-danger text-center txt-contact-validate" ></span>
  						      <div class="text-center col-lg-12">
                      <div class="form-group">                      
  						          <input type="submit" name="submit" id="submitbtnR" class="default-btn-one tw-mt-30" value="submit">
                      </div>
                    </div>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
@include('guest.layout.footer')
@endsection