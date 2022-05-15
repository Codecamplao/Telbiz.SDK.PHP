<?php

namespace CodeCampLAO\TelBiz\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @author Khamphai
 */
class TelBizSMS
{
    protected $guzzle;
    protected $token;
    public function __construct()
    {
        $this->guzzle = new Client([
            'base_uri' => config('telbiz.telbiz_credential.base_uri'),
            'verify' => false,
            'timeout' => 6000,
        ]);
        $this->token = new TelBizToken();
    }

    /**
     * @throws GuzzleException
     */
    protected function getAccessToken()
    {
        return $this->token->getTokenService();
    }

    /**
     * @throws GuzzleException
     */
    public function sendSmsService(string $title, string $phone, string $message)
    {
        $token = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $token['accessToken'],
            'Accept' => 'application/json',
            'Content-type' => 'application/json'
        ];
        $data = [
            'Title' => $title,
            'Phone' => $phone,
            'Message' => $message
        ];
        $result = $this->guzzle->request('POST', 'smsservice/newtransaction', ['headers' => $headers, 'json' => $data]);
        return json_decode($result->getBody()->getContents(), true);
    }
}
