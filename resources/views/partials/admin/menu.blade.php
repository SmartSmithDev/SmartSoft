<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!--SideBar Menu : Using GenerateMenu MiddleWare with lavary/laravel-menu Plugin -->
    {!! $LeftSideMenu->asUl( ['class' => 'sidebar-menu' , 'data-widget' => "tree"] , ['class'=>'treeview-menu']) !!}
    <!-- /.sidebar -->
  </section>
</aside>