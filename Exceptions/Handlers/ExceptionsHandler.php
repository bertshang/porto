<?php

namespace Bertshang\Porto\Exceptions\Handlers;

use Exception;
use App\Ship\Exceptions\MissingJSONHeaderException;
use Illuminate\Support\Facades\Config;
use Bertshang\Api\ExceptionHandler as HeimdalExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as LaravelExceptionHandler;

/**
 * Class ExceptionsHandler
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ExceptionsHandler extends HeimdalExceptionHandler
{
    public function render($request, Exception $e)
    {
        // if the user expects json or the API forces the user to send it
        if (($request->expectsJson()) || (Config::get('porto.requests.force-accept-header') && $e instanceof MissingJSONHeaderException) || $_SERVER['HTTP_HOST'] == (parse_url(Config::get('porto.api.url'))['host'])) {
            // return the error as json
            return parent::render($request, $e);
        }

        // neither the user nor the application wants json
        return LaravelExceptionHandler::render($request, $e);
    }
}
