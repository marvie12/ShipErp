<?php
/**
 * @file BaseController.php
 * @brief Entry point for all global variables
 *
 * Serve as the entry point of all the Controllers, you can initialize your
 * global variables here.
 * @note if you will extend this controller to other controller always put this
 *       code on the class constructor.
 * @code{.php}
 * public function __construct()
 * {
 *      parent::__construct();
 * }
 * @endcode
 * @warning you cannot access all global variables init/set in BaseController
 *          if parent::__consctruct() is not defined.
 *
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Http\Helpers\StringHelper;
// use App\Http\Helpers\StatusHelper as Status;

use Request;
use Auth;
use View;

class BaseController extends Controller
{

    /**
     * @var array $sites
     * @brief Will hold all the information of the selected sites.
     *
     * @todo if you want to add additional information, edit the file
     *       /app/config/site.php
     */
	public $site = [];

    /**
     * @var array $schema
     * @brief Will hold schema section name and web schema data
     */
    public $schema = '';
    public $user = '';

    public $crawler = false;

    /**
     * set all default values to be able to use by all the controllers
     */
	public function __construct()
	{

        /**
         * @todo config("site") can be set in /app/config/site.php
         */
        $this->site          = config('site');
        $this->user          = Auth::user();
                
        /**!< View Composer
         * Reference: https://laravel.com/docs/5.0/views#view-composers
         * this will set your variables to be available in all of your views
         * the '*' set is for all views
         */
		View::composer('*', function($view) {
            $view->with('site', $this->site)
                 ->with('schema', $this->schema);
		});
	}
    
}
