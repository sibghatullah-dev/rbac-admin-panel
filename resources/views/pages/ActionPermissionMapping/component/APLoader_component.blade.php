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
       Action Role Mapping
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/allorg"><i class="fa fa-dashboard"></i> Action Permission Mapping</a></li>
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
              <h3 class="box-title">Action Permission Mapping</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/post_form" method="post">
                @csrf
              <div class="box-body">
<!--                    <div class="form-group col-md-6">
                      <label>Select Organization</label>
                      <select class="form-control" name="orgtype" required id="orgtype">
                     @foreach(\App\Models\Organization::get() as $org)
                    <option value='{{ $org->id }}'>{{ $org->organization_name }}</option>
                        @endforeach
                        <option value="nill" selected>Select Organization</option>
                  </select>
                </div>-->
                  <div class="form-group col-md-6">
                      <label>Select Action</label>
                      <select class="form-control" name="a_id" id="actionid" onchange="getperm()" required>
                     @foreach(\App\Models\Action::get() as $a)
                    <option value='{{ $a->id }}'>{{ $a->action_name }}</option>
                        @endforeach
                        <option value="nill" selected>Select Action</option>
                  </select>
                </div>
                 
                  
                  
                  <div class="form-group col-md-6" >
                          <label>Your Permissions</label>
                         <div id="container">
                             
                         </div>
                     
                </div>
                  
              </div>
                
                 <div class="box-body">
                   <div class="form-group col-md-6">
                  <div class="box-footer" style="margin-left:20%;">
                <button type="submit" class="btn btn-info btn-lg">Add Permission </button>
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

    </section>
        <script>
//           
    function getperm() {
        // body...
        var ac_id = document.getElementById("actionid").value;
        var all_perm = {!! json_encode($data->toArray()) !!};
        //console.log(ac_id);
        var check=false;
        var e = document.getElementById('container');
        
        var count = 0;
        e.innerHTML="";
    $.ajax({
        url: '/post_permission',
        type: 'post',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data: { "a_id":ac_id},
        success: function(response) {
            console.log(response);
            console.log(all_perm);
            $(all_perm).each(function(index,value){
                console.log(value['id']);
                
                $(response).each(function(indexs,values){
                    console.log(values);
                    if(values['permission_id']==value['id']){
                        check=true;
                        return false;
                    }else{
                        check = false;
                    }
                 
                           
                })
              console.log(check);
                if(check){
                    
                $('#container').append(' <input type="checkbox" class="action_s" name="p_id[]" value="'+value['id']+'" checked>');
                $('#container').append('<label for="interest"> &nbsp &nbsp  &nbsp '+value['permission_name']+'</label></div> <br>');
               
                }else{
                    
                $('#container').append(' <input type="checkbox" class="action_s" name="p_id[]" value="'+value['id']+'">');
                $('#container').append('<label for="interest"> &nbsp &nbsp  &nbsp '+value['permission_name']+'</label></div> <br>');
               
                }
            })
            
//            console.log(response);
//            var array = [];
//            $(response).each(function(index, value){
//                array.push(value['permission_id']);
//            });
//            
//            $(all_perm).each(function(index,value){
//                if(array[])
//            })
//            console.log(array);
//            console.log(all_perm);
            
        }
    });
    }
        </script>