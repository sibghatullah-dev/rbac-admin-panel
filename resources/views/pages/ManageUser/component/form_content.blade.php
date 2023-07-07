<link rel="stylesheet" href="{{asset('dist/bootstrap-float-label.css')}}">
<style>
    .image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
#preview{  
  max-height:256px;
  height:auto;
  width:auto;
  display:block;
  margin-left: auto;
   margin-right: auto;
  padding:5px;
}
#img_container{
  border-radius:5px;
  margin-top:20px;
  width:auto;  
}
.input-group{  
  margin-left:calc(calc(100vw - 100%)/2);
  margin-top:40px;
  width:auto;
}
.imgInp{  
  width:150px;
  margin-top:10px;
  padding:10px;
  background-color:#d3d3d3;  
}
.loading{
   animation:blinkingText ease 2.5s infinite;
}
@keyframes blinkingText{
    0%{     color: #000;    }     
    50%{   color: #transparent; }
    99%{    color:transparent;  }
    100%{ color:#000; }
}
.custom-file-label{
  cursor:pointer;
}
.custom-file{
    margin-left: 150px;
}
</style>

<section class="content-header">
      <h1>
       Add New User
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Manage User</a></li>
        <li><a href="#">Add User</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/register_validation" method="post" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                   <div class="form-group col-md-6"> 
                  <div id='img_container'><img id="preview" src="https://webdevtrick.com/wp-content/uploads/preview-img.jpg" alt="your image" title=''/></div> 
                <div class="custom-file">
                    <input type="file" id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01" name="images" required>
                    <label class="custom-file-label" for="inputGroupFile01">Choose Profile Image</label>
                </div>
                  </div>
                  <div class="form-group col-md-6">
                      <label>Select Organization</label>
                  <select class="form-control" name="orgtype" required>
                     @foreach(\App\Models\Organization::get() as $org)
                        $selected = '';
                        if($org->id == 1)    // Any Id
                        {
                        $selected = 'selected="selected"';
                        }else{
                         $selected = 'Select Organization';
                        }
                    <option value='{{ $org->id }}'>{{ $org->organization_name }}</option>
                        @endforeach
                        <option value="nill" selected>Select Organization</option>
                  </select>
                </div>
                  <div class="form-group col-md-6">
                  <label>Select Role</label>
                  <select class="form-control"  name="roletype" required>
                    @foreach(\App\Models\Role::get() as $role)
                        $selected = '';
                        if($role->id == 1)    // Any Id
                        {
                        $selected = 'selected="selected"';
                        }else{
                        $selected = 'Select role';
                        }
                    <option value='{{ $role->id }}'>{{ $role->role_name }}</option>
                        @endforeach
                        <option value="nill" selected>Select Role</option>
                  </select>
                </div>
                  
                <div class="form-group col-md-6">
                  <span class="has-float-label">
                <input class="form-control" id="first" type="text" placeholder="Name" name="username" required/>
                <label for="first">Name</label>
                  </span>
                </div>
                <div class="form-group col-md-6">
                  <span class="has-float-label">
                <input class="form-control" id="second" type="text" placeholder="Email" name="email" required/>
            <label for="second">Email</label>
        </span>    
                </div>
                  
                <div class="form-group col-md-6" >
                  <span class="has-float-label">
                <input class="form-control" id="third" type="password" placeholder="password" name="password" required/>
            <label for="third">Password</label>
        </span>  
                </div>
                  
                <div class="form-group col-md-6">
                 <span class="has-float-label">
                <input class="form-control" id="fourth" type="password" placeholder="Confirm Password" name="cpassword" required/>
                <label for="fourth">Confirm Password</label>
                </span>  
                </div>
                 <div class="form-group col-md-6">
                  <div class="box-footer" style="margin-left:50px;">
                <button type="submit" class="btn btn-info btn-lg">Add User </button>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                
              <a href="/allusers" class="btn btn-info btn-lg">
           Cancel
        </a>
            
              </div>
              </div>
              </div>
                
              <!-- /.box-body -->

              
              
            
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
        
        <script>
        $("#inputGroupFile01").change(function(event) {  
  RecurFadeIn();
  readURL(this);    
});
$("#inputGroupFile01").on('click',function(event){
  RecurFadeIn();
});
function readURL(input) {    
  if (input.files && input.files[0]) {   
    var reader = new FileReader();
    var filename = $("#inputGroupFile01").val();
    filename = filename.substring(filename.lastIndexOf('\\')+1);
    reader.onload = function(e) {
      debugger;      
      $('#preview').attr('src', e.target.result);
      $('#preview').hide();
      $('#preview').fadeIn(500);      
      $('.custom-file-label').text(filename);             
    }
    reader.readAsDataURL(input.files[0]);    
  } 
  $(".alert").removeClass("loading").hide();
}
function RecurFadeIn(){ 
  console.log('ran');
  FadeInAlert("Wait for it...");  
}
function FadeInAlert(text){
  $(".alert").show();
  $(".alert").text(text).addClass("loading");  
}
        </script>