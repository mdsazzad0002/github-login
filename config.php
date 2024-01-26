<?php
class git
{
    // your client_id and client_secret
    public $client_id = 'Iv1.9d65f06c79d36c23';
    public $client_secret = '0c8dca5b34ae134e54ab8fdff99a8d8641aad87e';
    public $redirect_uri = "http://localhost:80/git_project/github-login";

    public $authorizeURL = "https://github.com/login/oauth/authorize";
    public $tokenURL = "https://github.com/login/oauth/access_token";
    public $apiURLBase = "https://api.github.com";




    // get user code
    function usercode()
    {
        // another method use array
        $param = ['client_id' => $this->client_id];
        header('location:' . $this->authorizeURL . '?' . http_build_query($param));
    }



    // get token user
    function usertoken($git_code = null)
    {
        if ($git_code == null) {
            echo "git code not found";
        } else {
            $pram = [
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'code' => $git_code,
                'redirect_uri' => $this->redirect_uri
            ];



            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->tokenURL,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $pram,
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            // echo $response;
            parse_str($response, $response_array);

            // echo $response['access_token'];
            return $this->getUserInfo($response_array['access_token']);
        }
    }



    // get user info
    function getUserInfo($access_token)
    {

        $apiURL = $this->apiURLBase . '/user';

        $ch = curl_init();
        curl_setopt_array(
            $ch,
            [
                CURLOPT_URL => $apiURL,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Authorization: token ' . $access_token),
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_USERAGENT => 'login-github',
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]
        );

        $api_response = curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200) {
            if (curl_errno($ch)) {
                $error_msg = curl_error(($ch));
            } else {
                $error_msg = $api_response;
            }
            throw new Exception(("Error " . $http_code . ": " . $error_msg));
        } else {
            return json_decode($api_response, true);
        }
    }


    function save_image($inPath, $outPath)
    {
        $in = fopen($inPath, "rb");
        $out = fopen($outPath, "wb");
        while ($chunk = fread($in, 8192)) {
            fwrite($out, $chunk, 8192);
        }
        fclose($in);
        fclose($out);
    }
}
