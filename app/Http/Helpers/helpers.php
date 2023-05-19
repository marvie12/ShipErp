<?php
/**
 * Various helpers
 * @author Mandani Mark Vincent <euricazordic@yahoo.com>
 */

if (! function_exists('device_type') ) {
    global $detect;
    $detect = new Mobile_Detect();

    function device_type() {
        global $detect;

        $request = request();
        $preview = $request->input('preview');
        $device = $request->input('device');

        if ($preview == 1 && $device == 'mobile') {
           $deviceType = 'mobile';
        } else {
            $deviceType = $detect->isMobile() ? ($detect->isTablet() ? 'desktop' : 'mobile') : 'desktop';
        }

        return $deviceType;
    }
}

if (! function_exists('view_path') ) {
    
    function view_path($path, $devicePathOverride = false) {

        $request = request();
        $preview = $request->input('preview');
        $device = $request->input('device');

        //fixing view path that starts with period symbol
        $path = implode('.', (array_filter(explode('.', $path))));
        $setmobile = "default.{$path}";

        if ($preview == 1 && $device == 'mobile') {
            $template = $setmobile;
        } else {
            // get path override folder
            $pathOverride = config('site.devicePathOverride');

            $template = $pathOverride.".{$path}";
            $device = device_type();
            if ( $device == 'mobile' || !View::exists($template)) {
                $template = $setmobile;
            }
        }
        
        return $template;
    }

}

if (! function_exists('script') ) {

    function script($section)
    {
        if(isset($GLOBALS['scriptHelper'][$section]['script'])) {
            foreach ($GLOBALS['scriptHelper'][$section]['script'] as $script) {
                echo Html::script($script['url'], $script['attributes'], $script['secure']);
            }
        }
    }

}

if (! function_exists('add_script') ) {

    function add_script($section, $url, $attributes = array(), $secure = null)
    {
        $scriptKey = sha1($url);

        $GLOBALS['scriptHelper'][$section]['script'][$scriptKey] = array(
            'url' => $url,
            'attributes' => $attributes,
            'secure' => $secure,
        );

    }

}

if (! function_exists('debug_mode') ) {
    /**
     * alternative debugging (print_r(), dd() && var_dump())
     *
     * @param      <type>  $debugType  [1 = print_r(), 2 = dd(), 3 = var_dump()]
     * @param      <type>  $values     array or json object
     */
    function debug_mode($debugType, $values)
    {
        if (config('app.debug')) {
            switch ($debugType) {
                case 1:
                    print_r($values);
                    break;
                case 2:
                    dd($values);
                    break;
                case 3:
                    var_dump($values);
                    break;
                default:
                    break;
            }
        }
    }

}
function curl_get($url) {

    // Initialize cURL
    $ch = curl_init();

    // Set the URL to fetch
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [            
            'Accept: application/vnd.github.v3+json',
            'User-Agent: My-App'
        ]
    );

    // Set the option to return the response instead of outputting it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        $error = curl_error($ch);
        // Handle the error
    }

    // Close cURL
    curl_close($ch);

    // Process the response
    return $response;
}