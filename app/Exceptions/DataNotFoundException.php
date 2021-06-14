<?php
/**
 *  app/Exceptions/DataNotFoundException.php
 *
 * Date-Time: 14.06.21
 * Time: 10:55
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class DataNotFoundException
 * @package App\Exceptions
 */
class DataNotFoundException extends Exception
{
    public function report()
    {
        //
    }

    /**
     * Return json error for dataNotFound
     *
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'Resource not found',
            'status' => 404
        ],404);
    }
}
