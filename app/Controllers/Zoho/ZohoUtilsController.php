<?php

namespace App\Controllers\Zoho;

use App\Controllers\BaseController;
use App\Models\Zoho\ZohoClientModel;
use App\Models\Zoho\ZohoModel;
use App\Models\Zoho\ZohoTokenModel;
use CodeIgniter\Config\Services;

class ZohoUtilsController extends BaseController
{
    /**
     * @param ZohoModel $zoho
     * @param string $state
     * @return string
     */
    public static function generateAuthorizationURL(ZohoModel $zoho, string $state = '')
    {
        $url = getenv('ACCOUNTS_ZOHO_URL_US') . "/oauth/v2/auth?scope=PhoneBridge.call.log,PhoneBridge.zohoone.search&client_id={clientId}&redirect_uri={redirectUri}&state={state}&response_type=code&access_type=offline";
        $url = str_replace("{clientId}", $zoho->getClientId(), $url);
        $url = str_replace("{redirectUri}", $zoho->getRedirectUrl(), $url);
        $url = str_replace("{state}", $state, $url);

        return $url;
    }

    /**
     * @param ZohoModel $zoho
     * @param string $code
     * @param string $location
     * @return ZohoTokenModel
     */
    public static function generateToken(ZohoModel $zoho, string $code, string $location = 'us')
    {
        $apiDomain = getenv('ACCOUNTS_ZOHO_URL_US');
        $secret = $zoho->getClientSecretUS();

        if ($location == "eu") {
            $secret = $zoho->getClientSecretEU();
            $apiDomain = getenv('ACCOUNTS_ZOHO_URL_EU');;
        }

        $url = $apiDomain . "/oauth/v2/token?code={code}&client_id={clientId}&client_secret={clientSecret}&redirect_uri={redirectUri}&grant_type=authorization_code";
        $url = str_replace("{code}", $code, $url);
        $url = str_replace("{clientId}", $zoho->getClientId(), $url);
        $url = str_replace("{clientSecret}", $secret, $url);
        $url = str_replace("{redirectUri}", $zoho->getRedirectUrl(), $url);

        $client = Services::curlrequest();

        try {
            $request = $client->post($url);

            if ($request->getStatusCode() == 200) {

                $body = json_decode($request->getBody(), true);

                if (isset($body["error"])) {
                    throw new \Exception($body["error"], 401);
                }

                if (!isset($body["refresh_token"])) {
                    throw new \Exception($body["error"], 401);
                }

                // salvar o token no banco

                $token = new ZohoTokenModel();
                $token->setTokenType($body["token_type"])
                    ->setAccessToken($body["access_token"])
                    ->setRefreshToken($body["refresh_token"])
                    ->setApiDomain($body["api_domain"])
                    ->setExpiresIn($body["expires_in"])
                    ->setUpdatedAt(time())
                    ->setCreatedAt(time());

                return $token;

            } else {
                throw new \Exception("Unauthorized", 401);
            }

        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    /**
     * @param ZohoClientModel $zohoClient
     * @param ZohoTokenModel $zohoToken
     * @throws \Exception
     */
    public static function refreshToken(ZohoClientModel $zohoClient, ZohoTokenModel $zohoToken)
    {
        $apiDomain = getenv('ACCOUNTS_ZOHO_URL_US');
        $secret = $zohoClient->getClientSecretUS();

        if (self::endsWith($zohoToken->getApiDomain(), "eu")) {
            $apiDomain = getenv('ACCOUNTS_ZOHO_URL_EU');
            $secret = $zohoClient->getClientSecretEU();
        }

        $url = $apiDomain . "/oauth/v2/token?refresh_token={refreshToken}&client_id={clientId}&client_secret={clientSecret}&grant_type=refresh_token";
        $url = str_replace("{refreshToken}", $zohoToken->getRefreshToken(), $url);
        $url = str_replace("{clientId}", $zohoClient->getClientId(), $url);
        $url = str_replace("{clientSecret}", $secret, $url);

        $client = Services::curlrequest();

        try {
            $request = $client->post($url);

            if ($request->getStatusCode() == 200) {

                $body = json_decode($request->getBody(), true);

                if (isset($body["error"])) {
                    throw new \Exception($body["error"], 401);
                }

                $zohoToken
                    ->setTokenType($body["token_type"])
                    ->setUpdatedAt(time())
                    ->setAccessToken($body["access_token"])
                    ->setApiDomain($body["api_domain"])
                    ->setExpiresIn($body["expires_in"]);

            } else {
                throw new \Exception("Unauthorized", 401);
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    /**
     * @param $location
     * @return string
     */
    public static function getUrlByLocation($location)
    {
        $client = new Client(['http_errors' => false]);
        $response = $client->get(getenv('ACCOUNTS_ZOHO_URL_US') . "/oauth/serverinfo");

        if ($response->getStatusCode() == 200) {
            $content = json_decode($response->getBody()->getContents(), true);

            if (isset($content["locations"]) && isset($content["locations"][$location])) {
                return $content["locations"][$location];
            }
        }

        return getenv('ACCOUNTS_ZOHO_URL_US');
    }

    private static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return $length === 0 || (substr($haystack, -$length) === $needle);
    }
}
