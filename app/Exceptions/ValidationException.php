<?php
/**
 *  app/Exceptions/ValidationException.php
 *
 * Date-Time: 14.06.21
 * Time: 10:08
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

/**
 * Class ValidationException
 * @package App\Exceptions
 */
class ValidationException extends Exception
{
    // $code should be 422
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function report()
    {
        //
    }

    /**
     * Return json error for Validation
     *
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'errors' => $this->message,
            'status' => $this->code
        ],$this->code);
    }
}
