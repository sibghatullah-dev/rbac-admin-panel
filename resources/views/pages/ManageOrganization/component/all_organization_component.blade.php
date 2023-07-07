 <section class="content-header">
      <h1>
        Manage Organization
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Organization</li>
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
              <a href="/addorg" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-plus"></span> Add Organization 
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
                  <th>Organization Id</th>
                  <th>Name</th>
                  <th>Description</th>
                 </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Organization::all() as $org)
                @if($org->is_delete==NULL)
                <tr>
                    <td>{{ $org->id }}</td>
                  <td>{{ $org->organization_name }}</td>
                  <td>{{ $org->Organization_description }}</td>
                  <td>
                       &nbsp &nbsp
                        @foreach(\App\Models\Permission::all() as $p)
               @foreach($pcode as $p_code)
               @if($p->permission_code==$p_code && $p_code==4000)
                       <a href="/vieworg/{{$org->id}}"><span class="glyphicon glyphicon-eye-open"></span></a>
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
                       <a href="/editorg/{{ $org->id }}" class="edit"> <span class="glyphicon glyphicon-edit"></span></a>
                       
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
                       <a href="/deleteorg/{{ $org->id }}" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
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