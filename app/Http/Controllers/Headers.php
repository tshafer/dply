<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Crew\Unsplash\HttpClient as CrewHttp;
use  Crew\Unsplash\Photo as CrewPhoto;
use Jenssegers\Agent\Agent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Url;
use App\Stat;
use Torann\GeoIP\Facades\GeoIP;
use UAParser\Parser;
use hisorange\BrowserDetect\Facade as Browser;
use ConsoleTVs\Charts\Facades\Charts;

class Headers extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public $photo;

    public function __construct() {

        CrewHttp::init([
            'applicationId' => '1cb9ad15174c1e797d4e678889426548163d966407bf71770c0de479a2a09d72',
            'utmSource' => 'Code Deploy'
        ]);

        try {
            $photo = CrewPhoto::random();
            $this->photo = $photo->urls['regular'];
        } catch(\Exception $e) {
            $this->photo = '/images/background.jpg';
        }


    }
    /**
     * Index
     *
     * @param  \Illuminate\Http\Request  $request  The request
     *
     * @return  <type>                    ( description_of_the_return_value )
     */
    public function index(Request $request) {

        $image = $this->photo;

        return view('headers', compact('image'));
    }

    /**
     * Create Shortcode
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function store(Request $request) {
        $request->validate([
            'url' => 'required|url'
        ]);



        $image = $this->photo;

        $oldUrl = $request->get('url');

        $browser = new \Buzz\Browser();
$response = $browser->get($oldUrl);
dd($response->getHeaders());

    }
}
