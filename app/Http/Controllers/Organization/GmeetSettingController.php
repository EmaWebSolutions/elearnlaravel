<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\GmeetSetting;
use App\Traits\General;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Google_Client;
use Google_Service_Calendar;

class GmeetSettingController extends Controller
{
    use General;

    protected function getClientToken()
    {
        $applicationName = env('APP_NAME');
        $redirectUri = route('organization.gmeet_setting');
        $clientId = get_option('gmeet_client_id');
        $clientSecret = get_option('gmeet_client_secret');
        $client = new Google_Client();

        $client->setApplicationName($applicationName);
        $client->setRedirectUri($redirectUri);

        $client->setScopes(Google_Service_Calendar::CALENDAR);
        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
        $client->setHttpClient($guzzleClient);

        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    public function gMeetSetting(Request $request)
    {
        if (get_option('gmeet_status')) {
            $data['title'] = 'Gmeet Setting';
            $data['navGmeetSettingActiveClass'] = 'active';
            $data['gmeet'] = GmeetSetting::whereUserId(Auth::id())->first();
            if ($request->code) {
                $applicationName = env('APP_NAME');
                $redirectUri = route('organization.gmeet_setting');
                $clientId = get_option('gmeet_client_id');
                $clientSecret = get_option('gmeet_client_secret');
                $client = new Google_Client();

                $client->setApplicationName($applicationName);
                $client->setRedirectUri($redirectUri);

                $client->setScopes(Google_Service_Calendar::CALENDAR);
                $client->setClientId($clientId);
                $client->setClientSecret($clientSecret);
                $client->setAccessType('offline');
                $client->setPrompt('select_account consent');
                $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
                $client->setHttpClient($guzzleClient);

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode(trim($request->code));
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }

                if($data['gmeet']){
                    $data['gmeet']->token = json_encode($accessToken);
                    $data['gmeet']->status = GMEET_AUTHORIZE;
                    $data['gmeet']->save();
                }

                $this->showToastrMessage('success', __('Updated Successfully'));
                return redirect()->back();
            }

            return view('organization.settings.gmeet-setting', $data);
        } else {
            $this->showToastrMessage('error', __('Google Meet is not enabled'));
            return redirect()->route('organization.dashboard');
        }
    }

    public function gMeetSettingUpdate(Request $request)
    {
        $request->validate([
            'calender_id' => 'required',
            'timezone' => 'required',
        ]);


        $gmeet = GmeetSetting::whereUserId(Auth::id())->first();

        $oldStatus =  (!is_null($gmeet)) ? $gmeet->status : 0;

        if (!$gmeet) {
            $gmeet = new GmeetSetting();
        }

        $gmeet->user_id = Auth::id();
        $gmeet->calender_id = $request->calender_id;
        $gmeet->timezone = $request->timezone;

        if ($gmeet->status == GMEET_AUTHORIZE) {
            $gmeet->status = GMEET_UNAUTHORIZE;
            $gmeet->save();
            return $this->getClientToken();
        }
        else{
            $gmeet->status = $request->status;
            $gmeet->save();
        }

        $this->showToastrMessage('success', __('Updated Successfully'));
        return redirect()->back();
    }

}
