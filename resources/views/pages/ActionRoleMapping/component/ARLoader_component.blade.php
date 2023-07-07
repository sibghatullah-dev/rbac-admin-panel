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
        <li><a href="/allorg"><i class="fa fa-dashboard"></i> Action Role Mapping</a></li>
        
        
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
              <h3 class="box-title">Action Role Mapping</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/post_apm" method="post">
                @csrf
              <div class="box-body">
                    <div class="form-group col-md-6">
                      <label>Select Organization</label>
                      <select class="form-control" name="orgtype" required id="orgtype" onchange="get_roles_by_orgnization()">
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
                      <div id="container">
                          <select class="form-control" name="role_id" id="select1" onchange="get_action_by_role()" required>
                        <option value="nill" selected>Select Role</option>
                        </select>
                      </div>
                      
                     
                </div>
                 
                  
                <div class="form-group col-md-3" >
                    <br>
                          <label>Your Actions</label>
                         <div id="containers">
                             
                         </div>
                     
                </div>
                  
              </div>
                
                 <div class="box-body">
                   <div class="form-group col-md-6">
                  <div class="box-footer" style="margin-left:20%;">
                <button type="submit" class="btn btn-info btn-lg">Mapped Role </button>
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
       function get_roles_by_orgnization(){
                 // body...
        var org_id = document.getElementById("orgtype").value;
        
        //var e = document.getElementById('container');
        //var mySelect = $("#mySelect")
        //var count = 0;
        //e.innerHTML="";
    $.ajax({
        url: '/role_with_org',
        type: 'post',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data: { "org_type":org_id},
        success: function(response) {
            console.log(response);
            $(response).each(function(index, value){
              
  
            $('#select1').append(`<option value="${value['id']}"> 
                                       ${value['role_name']} 
                                  </option>`);
            })
        }
    });
            }
            
            
   function get_action_by_role(){
                 // body...
        var roleid = $('#select1').val(); 
        var all_action = {!! json_encode( $actions->toArray()) !!};
        console.log(roleid);
        var e = document.getElementById('containers');
        //var mySelect = $("#mySelect")
        var check = false;
        e.innerHTML="";
    $.ajax({
        url: '/action_with_role',
        type: 'post',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data: { "role_id":roleid},
        success: function(response) {
            //console.log(response);
           console.log(response);
            //console.log(all_perm);
            $(all_action).each(function(index,value){
                console.log(value['id']);
                
                $(response).each(function(indexs,values){
                    console.log(values);
                    if(values['action_id']==value['id']){
                        check=true;
                        return false;
                    }else{
                        check = false;
                    }
                 
                           
                })
              console.log(check);
                if(check){
                    
                $('#containers').append(' <input type="checkbox" class="action_s" name="a_id[]" value="'+value['id']+'" checked>');
                $('#containers').append('<label for="interest"> &nbsp &nbsp  &nbsp '+value['action_name']+'</label></div> <br>');
               
                }else{
                    
                $('#containers').append(' <input type="checkbox" class="action_s" name="a_id[]" value="'+value['id']+'">');
                $('#containers').append('<label for="interest"> &nbsp &nbsp  &nbsp '+value['action_name']+'</label></div> <br>');
               
                }
            }) 
        }
    });
            }
        </script>