<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Crew\Unsplash\HttpClient as CrewHttp;
use Crew\Unsplash\Photo as CrewPhoto;
use Jenssegers\Agent\Agent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Url;
use App\Stat;
use Torann\GeoIP\Facades\GeoIP;
use UAParser\Parser;
use hisorange\BrowserDetect\Facade as Browser;
use ConsoleTVs\Charts\Facades\Charts;

class ShortCode extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Available short code domains
     *
     * @var        array
     */
    public $domains = [
        'dply.io',
        'cply.io'
    ];

    public $photo;

    public function __construct()
    {
        CrewHttp::init([
            'applicationId' => '1cb9ad15174c1e797d4e678889426548163d966407bf71770c0de479a2a09d72',
            'utmSource' => 'Code Deploy'
        ]);

        try {
            $photo = CrewPhoto::random();
            $this->photo = $photo->urls['regular'];
        } catch (\Exception $e) {
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
    public function index(Request $request)
    {
        $image = $this->photo;

        return view('index', compact('image'));
    }

    /**
     * Create Shortcode
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $image = $this->photo;

        $oldUrl = $request->get('url');

        if ($generatedUrl = Url::where('url', $request->get('url'))->first()) {
            $shortCode = $generatedUrl->shortcode;
        } else {
            do {
                $id = rand(10000, 99999);
                $shortCode =  base_convert($id, 20, 36);
            } while (Url::whereShortcode($shortCode)->exists());

            $domain = array_rand($this->domains);

            $generatedUrl = Url::create([
                'url'       => $request->get('url'),
                'shortcode' => $shortCode,
                'domain'    => $this->domains[$domain]
            ]);
        }

        $url = 'https://' . $generatedUrl->domain . '/' . $generatedUrl->shortcode;

        return view('index', compact('image', 'url', 'oldUrl'));
    }

    /**
     * Log stats and redirect
     *
     * @param      \Illuminate\Http\Request  $request  The request
     * @param      <type>                    $url      The url
     *
     * @return     <type>                    ( description_of_the_return_value )
     */
    public function redirect(Request $request, $url)
    {
        if (!$url) {
            return redirect()->url('/');
        }

        $location = GeoIP::getLocation(request()->ip());

        $browser = Browser::detect();

        $url = Url::whereShortcode($url)->firstOrFail();

        $url->stats()->create([
            'iso_code'          => $location->iso_code,
            'country'           => $location->country,
            'city'              => $location->city,
            'state'             => $location->state,
            'state_name'        => $location->state_name,
            'postal_code'       => $location->postal_code,
            'lat'               => $location->lat,
            'lon'               => $location->lon,
            'timezone'          => $location->timezone,
            'continent'         => $location->continent,
            'currency'          => $location->currency,
            'browser_name'      => Browser::browserName(),
            'browser_family'    => Browser::browserFamily(),
            'browser_version'   => Browser::browserVersion(),
            'browser_version_major' => Browser::browserVersionMajor(),
            'browser_version_minor' => Browser::browserVersionMinor(),
            'browser_version_patch' => Browser::browserVersionPatch(),
            'browser_engine'    => Browser::browserEngine(),
            'platform_name'     => Browser::platformName(),
            'platform_family'   => Browser::platformFamily(),
            'platform_version'  => Browser::platformVersion(),
            'platform_version_major' => Browser::platformVersionMajor(),
            'platform_version_minor' => Browser::platformVersionMinor(),
            'platform_version_patch' => Browser::platformVersionPatch(),
            'device_family'     => Browser::deviceFamily(),
            'device_model'      => Browser::deviceModel(),
            'mobile_grade'      => Browser::mobileGrade()
        ]);

        return redirect()->away($url->url);
    }

    /**
     * Stats
     *
     * @param      \Illuminate\Http\Request  $request  The request
     *
     * @return     view
     */
    public function stats(Request $request, $url)
    {
        if (!$url) {
            return redirect()->url('/');
        }

        $image = $this->photo;

        $url = Url::whereShortcode($url)->firstOrFail();

        // Url
        $realUrl = 'https://' . $url->domain . '/' . $url->shortcode;
        $url->realUrl = $realUrl;
        // Browser Stats
        $stats = $url->stats()->get();

        $browsers = Charts::database($stats, 'donut', 'highcharts')
        ->title("Browsers")
        ->elementLabel("Browsers")
        ->template("blue-material")
        ->dimensions(1000, 500)
        ->responsive(true)
        ->groupBy('browser_family');

        $visiters = Charts::database($stats, 'bar', 'highcharts')
        ->title("Visiters")
        ->elementLabel("Visiters Per Day")
        ->template("blue-material")
        ->dimensions(1000, 500)
        ->responsive(true)
        ->groupByDay();

        $platform = Charts::database($stats, 'bar', 'highcharts')
        ->title("Platform")
        ->elementLabel("Platform")
        ->template("blue-material")
        ->dimensions(1000, 500)
        ->responsive(true)
        ->groupBy('platform_family');

        $countries = $stats->groupBy('iso_code');
        $countriesCount = $countries->map(function ($item, $key) {
            return collect($item)->count();
        })->toArray();

        $geo = Charts::database($stats, 'geo', 'highcharts')
        ->title("Locations")
        ->elementLabel("Locations")
        ->template("blue-material")
        ->labels(array_keys($countriesCount))
        ->values(array_values($countriesCount))
        ->dimensions(1000, 500)
        ->responsive(true);



        return view('stats', compact('image', 'url', 'browsers', 'visiters', 'platform', 'stats', 'geo'));
    }
}
