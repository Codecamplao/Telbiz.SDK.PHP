<?php

namespace CodeCampLAO\TelBiz\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

/**
 * @author Khamphai
 */
class TelBizToken
{
    private $api;
    public function __construct()
    {
        $this->api = new Client([
            'base_uri'=>config('telbiz.telbiz_credential.base_uri'),
            'verify'=>false,
            'timeout' => 6000,
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json'
            ],
            'json' => [
                'ClientID' => config('telbiz.telbiz_credential.client_id'),
                'Secret' => config('telbiz.telbiz_credential.client_secret'),
                'GrantType' => 'client_credentials',
                'Scope' => 'Telbiz_API_SCOPE profile openid'
            ]
        ]);
    }

    public function getTokenService()  {
        try {
            $result = $this->api->request('POST', 'connect/token');
            return json_decode($result->getBody()->getContents(), true);
        } catch (ConnectException|RequestException $e) {
            $error['error'] = $e->getMessage();
            $error['request'] = $e->getRequest();
            if($e->hasResponse()){
                if ($e->getResponse()->getStatusCode() == '400'){
                    $error['response'] = $e->getResponse();
                }
            }
            Log::error('Error occurred in get request.', ['error' => $error]);
        }

    }

}
