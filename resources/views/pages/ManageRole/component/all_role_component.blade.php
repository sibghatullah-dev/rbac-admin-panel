 <section class="content-header">
      <h1>
        Manage Role
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Role</li>
      </ol>
    </section>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
          <div class="col-xs-12">
          <div class="box">
              @foreach(\App\Models\Permission::all() as $p)
               @foreach($pcode as $p_code)
               @if($p->permission_code==$p_code && $p_code==1000)
            <div class="box-header">
              <a href="/addrole" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-plus"></span> Add Role 
        </a>
            </div>
                @break
               @else
                 @continue
               @endif
              @endforeach
              @endforeach
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Role Id</th>
                  <th>Role Name</th>
                  <th>Role Description</th>
                 </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Role::all() as $role)
                @if($role->is_delete==NULL)
                <tr>
                    <td>{{ $role->id }}</td>
                  <td>{{ $role->role_name }}</td>
                  <td>{{ $role->role_descriptions }}</td>
                  <td>
                       &nbsp &nbsp
                       @foreach(\App\Models\Permission::all() as $p)
               @foreach($pcode as $p_code)
               @if($p->permission_code==$p_code && $p_code==4000)
                       <a href="/viewrole/{{$role->id}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                       @break
               @else
                 @continue
               @endif
              @endforeach
              @endforeach
                       
                       &nbsp &nbsp
                       @foreach(\App\Models\Permission::all() as $p)
               @foreach($pcode as $p_code)
               @if($p->permission_code==$p_code && $p_code==3000)
                       <a href="/editrole/{{ $role->id }}" class="edit"> <span class="glyphicon glyphicon-edit"></span></a>
                      @break
               @else
                 @continue
               @endif
              @endforeach
              @endforeach
                       &nbsp &nbsp
                       @foreach(\App\Models\Permission::all() as $p)
               @foreach($pcode as $p_code)
               @if($p->permission_code==$p_code && $p_code==2000)
                       <a href="/deleterole/{{ $role->id }}" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
                  @break
               @else
                 @continue
               @endif
              @endforeach
              @endforeach 
                  </td>
                </tr>
                 @endif
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
    </section>