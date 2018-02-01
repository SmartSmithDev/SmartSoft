 <div class="main-sidebar">
        <!-- Inner sidebar -->
        <div class="sidebar">
          <!-- user panel (Optional) -->
          <div class="user-panel" style="position: relative; z-index: 999;">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" >
            	<p>Company Name</p>
            	<div class="dropdown">
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span> &nbsp;{{ trans('general.switch') }}</a>
			  	<ul class="dropdown-menu" >
                    @foreach($companies as $com)
                    <li><a href="{{ url('companies/companies/'. $com->id .'/edit') }}">{{ str_limit($com->name, 18) }}</a></li>
                    @endforeach
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('companies/companies') }}">{{ trans('general.manage_companies') }}</a></li>
                </ul>
			</div>
            </div>
          </div><!-- /.user-panel -->
          <!-- search form -->
        <form action="#" method="get" id="form-search" class="sidebar-form">
            <div id="search" class="input-group">
                <input type="text" name="search" value="<?php //echo $search; ?>" id="input-search" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
          <!--SideBar Menu : Using GenerateMenu MiddleWare with lavary/laravel-menu Plugin -->
    {!! $LeftSideMenu->asUl( ['class' => 'sidebar-menu' , 'data-widget' => "tree"] , ['class'=>'treeview-menu']) !!}


        </div><!-- /.sidebar -->
      </div><!-- /.main-sidebar -->


@section('css')
<style type="text/css">

    .dropdown-menu >li >a{
        text-align: center;
    }

    .sidebar-menu, .main-sidebar .user-panel, .sidebar-menu>li.header{
        overflow: visible;
    }
</style>
