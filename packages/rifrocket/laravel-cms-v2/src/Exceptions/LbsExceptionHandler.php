<?php


namespace Rifrocket\LaravelCmsV2\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as AppHandler;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Throwable;
use Exception;

class LbsExceptionHandler extends AppHandler
{


    public function render($request, Throwable  $exception)
    {
        if ($request->wantsJson()) {   //add Accept: application/json in request
            return $this->handleApiException($request, $exception);
        } else {
            $retrieval = parent::render($request, $exception);
        }
        return $retrieval;
    }

    private function handleApiException($request, Throwable $exception)
    {
        $exception = $this->prepareException($exception);

        if ($exception instanceof HttpResponseException) {
            $exception = $exception->getResponse();
        }

        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
              $exception = $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            $exception = $this->convertValidationExceptionToResponse($exception, $request);
        }

        return $this->customApiResponse($exception);
    }

    private function customApiResponse($exception)
    {
        if (method_exists($exception, 'getCode') and $exception->getCode()!=0) {
            $statusCode = $exception->getCode();
        } else {
            $statusCode = 500;
        }

        $response = [
            'status'=> 'error',
            'message'=> $exception->getMessage(),
            'body'=> 'error',
        ];

        switch ($statusCode) {
            case 0:
                $response['code'] = 'unknown: '.$statusCode;
                break;

            case 401:
                $response['code'] = 'unknown: '.$statusCode;
                break;

            case 403:
                $response['code'] = 'unknown: '.$statusCode;
                break;

            case 404:
                $response['code'] = 'unknown: '.$statusCode;
                break;

            case 405:
                $response['code'] = 'unknown: '.$statusCode;
                break;

            case 422:
                $response['code'] = 'unknown: '.$statusCode;
                break;

            default:
            $response['code'] = 'unknown: '.$statusCode;
            break;
        }

        if (config('app.debug')) {
            $response['trace'] = $exception->getTrace();
            $response['code'] = $exception->getCode();
        }

        $response['response_code'] = $statusCode;

        return response()->json($response, $statusCode);
    }


//    Error path for admin side and web side
    // protected function registerErrorViewPaths()
    // {
    //     $paths = collect(config('laravelcrm.exception.member_exception_views'));

    //     if (config('laravelcrm.application.ssl')=='true'){
    //         $admin_root='https://'.config('laravelcrm.application.route_domain').'.'.env('APP_DOMAIN');
    //     }
    //     else{
    //         $admin_root='http://'.config('laravelcrm.application.route_domain').'.'.env('APP_DOMAIN');
    //     }

    //     if ((Request::root()==$admin_root) )
    //     {
    //         $paths = collect(config('laravelcrm.exception.admin_exception_views'));
    //         View::replaceNamespace('errors', $paths->map(function ($path) {
    //             return "{$path}";
    //         })->push(__DIR__.'/views')->all());
    //     }
    //     else
    //     {
    //         View::replaceNamespace('errors', $paths->map(function ($path) {
    //             return "{$path}";
    //         })->push(__DIR__.'/views')->all());
    //     }

    // }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ( $request->expectsJson()){

            return $this->customApiResponse($exception);
        }
        $guard=$exception->guards()[0];
        switch ($guard)
        {
            case 'admin':
                return redirect()->route('lbs.auth.admin.login');
                break;

            case 'member_api':
                return $this->customApiResponse($exception);
                break;

            default:
                return redirect()->guest('/login');
                break;
        }

    }
}
