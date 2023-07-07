
<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('uploads/images/profile/'.Session::get('user')->avatar)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Session::get('user')->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        @foreach(\App\Models\Action::whereIn('id',$ac)->get() as $menu_level)
        @if($menu_level->level==0)
        <li class="treeview" id="tree">
          <a href="{{ $menu_level->url }}" data-toggle="tooltip">
            <i class="fa fa-share"></i> <span>{{$menu_level->menu}}</span>
            <span class="pull-right-container">
                @if($menu_level->url=="")
              <i class="fa fa-angle-left pull-right"></i>
               @endif
            </span>
          </a>
          <ul class="treeview-menu">
              @foreach(\App\Models\Action::whereIn('id',$ac)->get() as $sub_menu)
              @if($sub_menu->level==1)
            <li>
                <a href='{{ $sub_menu->url }}' ><i class="fa fa-circle-o"></i> {{$sub_menu->menu}}
                <span class="pull-right-container">
                  @if($sub_menu->url=="")
                   <i class="fa fa-angle-left pull-right"></i>
                   @endif
                </span>
              </a>
              <ul class="treeview-menu">
                   @foreach(\App\Models\Action::whereIn('id',$ac)->get() as $sub_menu_g)
              @if($sub_menu_g->parent == $sub_menu->id && $sub_menu_g->level==2)
                <li>
                  <a href='{{ url($sub_menu_g->url) }}'><i class="fa fa-circle-o"></i> {{$sub_menu_g->menu}}
                    <span class="pull-right-container">
                      @if($sub_menu_g->url=="")
                        <i class="fa fa-angle-left pull-right"></i>
                        @endif
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    @foreach(\App\Models\Action::all() as $sub_menu_h)
                    @if($sub_menu_h->parent == $menu_level->parent && $sub_menu_h->level==3)
                    <li><a href="{{$sub_menu_h->url}}"><i class="fa fa-circle-o"></i> {{$sub_menu_h->menu}}</a></li>
                    @endif
                    @endforeach
                  </ul>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
            @endif
        @endforeach
          </ul>
        </li>
            @endif
        @endforeach
       
      </ul>
    </section>

