<?php
/**
 *  app/Http/Middleware/PaginateAPI.php
 *
 * Date-Time: 14.06.21
 * Time: 10:36
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class PaginateAPI
 * @package App\Http\Middleware
 */
class PaginateAPI
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $data = $response->getData(true);

        if (isset($data['links'])) {
            unset($data['links']);
        }

        if (isset($data['meta'])) {
            unset($data['meta']);
        }

        $response->setData($data);

        return $response;
    }
}
