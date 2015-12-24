<?php

namespace Helpers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class ControllerHelper
{

    /**
     * [ajaxWrapper description]
     * @param  [Closure] $callback [Callback function for return success result]
     * @param  array  $params   [Params for callback]
     * @return [string]           [Json]
     */
    public static function ajaxWrapper($callback, $params = array())
    {
        $result = array('error' => false);
        try {

            if (!Request::ajax()) {
                throw new Exception('Request error!');
            }

            $result['data'] = $callback($params);

        } catch (\Exception $e) {
            $result['error'] = true;
            $result['message'] = $e->getMessage();
        }
        return Response::json($result);
    }

}