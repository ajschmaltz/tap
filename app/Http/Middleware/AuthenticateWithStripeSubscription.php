<?php namespace App\Http\Middleware;

use Closure;

class AuthenticateWithStripeSubscription {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
    if ($request->user() && ! $request->user()->subscribed())
    {
      return redirect('billing');
    }

    return $next($request);
	}

}
