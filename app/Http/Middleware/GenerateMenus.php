<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('LeftSideMenu', function ($menu) {
            
            //Header
            $menu->add("MAIN NAVIGATION",[
                "class" => "header",
                'raw' => true,
            ]);


            $menu->add('Dashboard' , ['class' => 'treeview', 'id' => 'dashboard'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-dashboard"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>')
                ->active();

            $menu->get('dashboard')->add('Dashboard' , ['url' => 'dashboard'])
                ->prepend('<i class="fa fa-circle-o"></i>')
                ->active();



            $menu->add('Item', ['class' => 'treeview', 'id' => 'item' , 'action'  => 'Items\Items@index'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-cube"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');

            $menu->get('item')->add('Items' , ['action'  => 'Items\Items@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');




            $menu->add('Vendor', ['class' => 'treeview', 'id' => 'vendor'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-address-card"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');




            $menu->add('Company', ['class' => 'treeview', 'id' => 'company'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-building-o"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');



            $menu->add('Sales', ['class' => 'treeview', 'id' => 'sales'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-money"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');



            $menu->add('Purchases', ['class' => 'treeview', 'id' => 'purchase'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-shopping-cart"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');


            $menu->add('Reports', ['class' => 'treeview', 'id' => 'reports'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-file"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');



            $menu->add('Tax', ['class' => 'treeview', 'id' => 'tax'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-inr"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');


        });
        return $next($request);
    }
}
