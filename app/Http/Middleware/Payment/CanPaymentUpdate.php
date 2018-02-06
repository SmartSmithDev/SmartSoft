<?php

namespace App\Http\Middleware\Payment;

use Closure;

class CanPaymentUpdate
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
        if (!auth()->sales_payments()->can('payments-update')) {
            Session()->flash('flash_message_warning', 'Not allowed to update user');
            return redirect()->route('Payments.index');
        }
        return $next($request);
    }
}
