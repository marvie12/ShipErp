<?php

/**
 * @author  Mandani Mark Vincent <euricazordic@yahoo.com>
 */

namespace App\Http\Controllers;

use App\Http\Models\BaseShipErpProvider;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Home landing page.
     *
     * @param      \Illuminate\Http\Request  $request  The request
     *
     * @return     \Illuminate\View\View     ( Home view. )
     */
    public function index(Request $request)
    { 
        $pageDetails['pageTitle'] = $this->site['pageTitle'];
        $pageDetails['gitHubLink'] = $this->site['gitHubLink'];

        $provider = new BaseShipErpProvider();

        $pageDetails['providerLists'] = $provider->get()->toArray();
        
        return view(view_path('home.index'), $pageDetails);
    }

    /**
     * Action on Submit.
     *
     * @param   \Illuminate\Http\Request  $request  The request
     *
     * @return  json
     */
    public function getProviderImage(Request $request)
    {
        $_returnArray = [
            'message' => 'The response from Provider URL is invalid.',
            'status' => 'failed'
        ];

        $response = curl_get($request['src']);

        // Check if the response is a valid JSON
        $jsonData = json_decode($response);
        $isJson = (json_last_error() === JSON_ERROR_NONE);

        if ($isJson && !empty($jsonData->message)) {
            $imageInfo = getimagesize($jsonData->message);
            if ($imageInfo === false) {
                return json_encode($_returnArray);
            }
            return $response;
        }

        return json_encode($_returnArray);
    }
}
