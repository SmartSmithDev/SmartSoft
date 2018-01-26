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
                ->append('</span>');

            $menu->get('dashboard')->add('Dashboard' , ['url' => ''])
                ->prepend('<i class="fa fa-circle-o"></i>');



            $menu->add('Item', ['class' => 'treeview', 'id' => 'item' , 'action'  => 'Items\Items@index'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-cube"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');

            $menu->get('item')->add('All Items' , ['action'  => 'Items\Items@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('item')->add('New Item' , ['action'  => 'Items\Items@create'])
                ->prepend('<i class="fa fa-circle-o"></i>');




            // $menu->add('Vendor', ['class' => 'treeview', 'id' => 'vendor'])
            //     ->prepend('<span>')
            //     ->prepend('<i class="fa fa-address-card"></i>')
            //     ->append('</span>')
            //     ->append('<span class="pull-right-container">')
            //     ->append('<i class="fa fa-angle-left pull-right"></i>')
            //     ->append('</span>');

            //  $menu->get('vendor')->add('All Vendors' , ['action'  => 'Vendors\Vendors@index'])
            //     ->prepend('<i class="fa fa-users"></i>');

            // $menu->get('vendor')->add('New Vendors' , ['action'  => 'Vendors\Vendors@create'])
            //     ->prepend('<i class="fa fa-users"></i>');



            $menu->add('Company', ['class' => 'treeview', 'id' => 'company'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-building-o"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');

            $menu->get('company')->add('All Companies' , ['action'  => 'Companies\Companies@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('company')->add('New Company' , ['action'  => 'Companies\Companies@create'])
                ->prepend('<i class="fa fa-circle-o"></i>');



            $menu->add('Sales', ['class' => 'treeview', 'id' => 'sales'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-money"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');

            $menu->get('sales')->add('New Entry' , ['action'  => 'Sales\Sales@create'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('sales')->add('Sales Invoices' , ['action'  => 'Sales\Sales@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('sales')->add('Customers' , ['action'  => 'Sales\Customers@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            //Sales Payments

            $menu->get('sales')->add('Sales Payments', ['class' => 'treeview'])
                ->prepend('<i class="fa fa-money"></i>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');

            $menu->get('salesPayments')->add('All Payments' , ['action'  => 'Sales\Payments@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('salesPayments')->add('Add Payment' , ['action'  => 'Sales\Payments@create'])
                ->prepend('<i class="fa fa-circle-o"></i>');



            $menu->add('Purchases', ['class' => 'treeview', 'id' => 'purchases'])
                ->prepend('<span>')
                ->prepend('<i class="fa fa-shopping-cart"></i>')
                ->append('</span>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');

            $menu->get('purchases')->add('New Entry' , ['action'  => 'Purchases\Purchases@create'])
               ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('purchases')->add('All Purchases' , ['action'  => 'Purchases\Purchases@index'])
               ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('purchases')->add('Vendors' , ['action'  => 'Purchases\Vendors@index'])
                 ->prepend('<i class="fa fa-circle-o"></i>');


            //Purchase Payments

            $menu->get('purchases')->add('Purchase Payments', ['class' => 'treeview'])
                ->prepend('<i class="fa fa-money"></i>')
                ->append('<span class="pull-right-container">')
                ->append('<i class="fa fa-angle-left pull-right"></i>')
                ->append('</span>');

            $menu->get('purchasePayments')->add('All Payments' , ['action'  => 'Purchases\Payments@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('purchasePayments')->add('Add Payment' , ['action'  => 'Purchases\Payments@create'])
                ->prepend('<i class="fa fa-circle-o"></i>');


            // $menu->add('Payments', ['class' => 'treeview', 'id' => 'payments'])
            //     ->prepend('<span>')
            //     ->prepend('<i class="fa fa-money"></i>')
            //     ->append('</span>')
            //     ->append('<span class="pull-right-container">')
            //     ->append('<i class="fa fa-angle-left pull-right"></i>')
            //     ->append('</span>');



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

            $menu->get('tax')->add('GST' , ['action'  => 'Taxes\Gst@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');

            $menu->get('tax')->add('HSN' , ['action'  => 'Taxes\Hsn@index'])
                ->prepend('<i class="fa fa-circle-o"></i>');


        });
        return $next($request);
    }
}
