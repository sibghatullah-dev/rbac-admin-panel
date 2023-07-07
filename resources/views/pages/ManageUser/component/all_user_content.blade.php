 <section class="content-header">
      <h1>
        Manage Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage User</li>
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
                <a href="/register" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-plus"></span> Add User 
                </a>
                </div>
                @break
               @else
                 @continue
               @endif
              @endforeach
              @endforeach
            <!-- /.box-header -->
            <div class="box-body" style="overflow: auto;">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Organization</th>
                  <th style="width: 80px;">Role</th>
                  <th style="width: 80px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\User::all() as $user)
                @if($user->is_delete==NULL)
                <tr>
                    <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{  \App\Models\Organization::select('organization_name')->where('id', $user->organization_id)->get()[0]->organization_name }}</td>
                  <td>{{ \App\Models\Role::select('role_name')->where('id', $user->role_id)->get()[0]->role_name }}</td>
                  <td style="width: 150px;height: 40px; text-align: center;">
                       &nbsp &nbsp
                       @foreach(\App\Models\Permission::all() as $p)
                       @foreach($pcode as $p_code)
                       @if($p->permission_code==$p_code && $p_code==4000)
                       <a href="/view/{{$user->id}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                        @break
                        @else
                        @continue
                        @endif
                        @endforeach
                        @endforeach
                       
                        
                        &nbsp &nbsp
                       &nbsp &nbsp
                       
                       
                       @foreach(\App\Models\Permission::all() as $p)
                       @foreach($pcode as $p_code)
                       @if($p->permission_code==$p_code && $p_code==3000)
                       <a href="/edituser/{{ $user->id }}" class="edit"> <span class="glyphicon glyphicon-edit"></span></a>
                       @break
                        @else
                        @continue
                        @endif
                        @endforeach
                        @endforeach
                       
                        
                        &nbsp &nbsp
                       &nbsp &nbsp
                       
                       
                       @foreach(\App\Models\Permission::all() as $p)
                       @foreach($pcode as $p_code)
                       @if($p->permission_code==$p_code && $p_code==2000)
                       
                       <a href="/deleteuser/{{ $user->id }}" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
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