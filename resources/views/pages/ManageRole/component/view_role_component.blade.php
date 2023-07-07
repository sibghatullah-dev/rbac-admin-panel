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
       Add New Role
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/allorg"><i class="fa fa-dashboard"></i> Manage Role</a></li>
        <li><a href="/addorg">Add Role</a></li>
        
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
              <h3 class="box-title">Role Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/editrole_validation/{{ $data->id }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group col-md-6">
                  <span class="has-float-label">
                      <input class="form-control" id="first" type="text" placeholder="Role Name" name="rolename" value="{{ $data->role_name }}" required disabled/>
                <label for="first">Role Name</label>
                  </span>
                </div>
                <div class="form-group col-md-6">
                  <span class="has-float-label">
                      <input class="form-control" id="second" type="text" placeholder="Description" name="roledesc" value=" {{ $data->role_descriptions }}" required disabled/>
            <label for="second">Role Description</label>
        </span>    
                </div>
                  
              
                  
                
                 <div class="form-group col-md-6">
                  <div class="box-footer" style="margin-left:20%;">
                      <button type="submit" class="btn btn-info btn-lg" disabled>Add Role </button>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                
              <a href="/allrole" class="btn btn-info btn-lg">
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