<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css" src="style.css"></style>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
<style>


    .page-footer {
    position: relative;
    margin-top: 75px;
    bottom: 0;
    text-align: center;
    width: 100%;
    background-color: lightgrey;
}

.carousel-inner {
max-height: 400px;
img {
max-height: 400px;
}
}

@media (max-width: 476px) { 
  .card{
    margin-left: 0px;
  }
 }
@media (min-width: 800px) { 
  .card{
    margin-left: 200px;
  }
 }



	</style>


<div class="container">
  <div class="row">
    <div class="col-lg-8 d-block d-md-block d-sm-none" id="my-content">
      <!--  <div class="row justify-content-center">
    <h1 class="display-3 font-weight-bold">Welcome</h1>
    </div> -->
          <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel" style="margin-top: 100px;" >
      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->
      <!--Slides-->
      <div class="carousel-inner" role="listbox" id="abc">
        <!--First slide-->
        <div class="carousel-item active">
          <img class="d-block w-80  img-fluid" src="{{ asset('uploads/login/1.png')}}" alt="First slide">
        </div>
        <!--/First slide-->
        <!--Second slide-->
        <div class="carousel-item">
          <img class="d-block w-80 img-fluid" src="{{ asset('uploads/login/1.png')}}" alt="Second slide">
        </div>
        <!--/Second slide-->
        <!--Third slide-->
        <div class="carousel-item">
          <img class="d-block w-80 img-fluid" src="{{ asset('uploads/login/1.png')}}" alt="Third slide">
        </div>
        <!--/Third slide-->
      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
    </div>
 
    </div>
    <div class="col-lg-4" id="my-contentb">
      <div class="row" style="padding-left:40px; margin-top: 100px;">
  <img src="{{ asset('uploads/login/Logo.png')}}" class="rounded mx-auto d-block" alt="" style="width: 200px;">
  </div>

  <div class="row justify-content-center" style="margin-top: 5px;margin-left: 5px;">
    <h3 >LOG IN</h3>
    </div>

      <div class="card mx-xl-5" style="border: none;">

  <!-- Card body -->
  <div class="card-body" style="">

    <!-- Default form subscription -->
    <form action="/login_validation" method="post">
        @csrf 
      <!-- Default input name -->
      <input type="email" id="defaultFormCardNameEx" name="login_email" class="form-control " placeholder="Email" style="width: 300px;">
      <br>
      <!-- Default input email -->
      <input type="password" id="defaultFormCardEmailEx" name="login_password" class="form-control" placeholder="password" style="width: 300px;">

      <br>


      <div class="g-recaptcha" data-sitekey="your_site_key"></div>
      <br/>
       <div class="" style=" margin-top: 5px;">
      <p class="" style="font-size: .7rem;">By proceeding you agree to the <br> terms of <a class="text-info">servies</a> and <a class="text-info">privacy notice</a> </p>
      </div>

      <div class="">

     <button type="submit" class="btn rounded-pill btn-info" style="width: 250px; height: 55px;">Login</button>
      </div>
    </form>
    <!-- Default form subscription -->

  </div>
  <!-- Card body -->

</div>
 </div>
    </div>
     <div class="row " style="width: 100%;" >

    <div class="col-sm-4" style=" ">
       Powered by: <br><br>
      <img src="{{ asset('uploads/login/Logo.png')}}" alt="..." class="rounded" style="width: 100px; ">
    </div>
    
      <div class="col-sm-8">
       <p>Disclaimer</p>
       
      <p style="font-size: 0.6em;line-height: 2px; ">Your Transaction is secured using SSL Technology through a secure 256 bit</p>
      <p style="font-size: 0.6em;line-height: 2px; ">connection: Your information will not be shared with other parties</p>
      <p style="font-size: 0.6em;line-height: 3px;"><b>Access Time : </b> 11/11/2020 10:27 and IP 10.0.87.27 will logged for security </p>
      
     </div>
     
     
    
    
  </div>
 
 </div>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4 mt-4">

  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center">© 2020 Copyright:
    <a href="https://mdbootstrap.com/education/bootstrap/">Kodex Technologies</a>
  </div>
  <!-- Copyright -->

</footer>