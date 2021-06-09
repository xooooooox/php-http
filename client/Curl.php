<?php

namespace xooooooox\http\client;


/**
 * Class Curl
 */
class Curl
{

    /**
     * @param string $url
     * @param array $header
     * @return string
     */
    public static function Get(string $url = '', array $header = []) : string {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_HEADER, $header);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        if (is_bool($response)){
            return '';
        }
        return (string)$response;
    }

    /**
     * @param string $url
     * @param string $body
     * @param array $header
     * @return string
     */
    public static function Post(string $url= '', string $body = '', array $header = []) : string {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_HEADER, $header);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $error = curl_errno($curl);
        curl_close($curl);
        if ($error > 0) {
            return '';
        }
        if (is_bool($response)){
            return '';
        }
        return (string)$response;
    }

    /**
     * get response header and body
     * @param string $response
     * @return array
     */
    public static function getAll(string $response = '') : array {
        return explode(PHP_EOL, $response);
    }

    /**
     * get response header
     * @param string $response
     * @return array
     */
    public static function getHeader(string $response = '') : array {
        $response = explode(PHP_EOL, $response);
        // delete response body data
        array_pop($response);
        // delete empty line between header and body
        array_pop($response);
        return $response;
    }

    /**
     * get response body
     * @param string $response
     * @return string
     */
    public static function getBody(string $response = '') : string {
        $response = explode(PHP_EOL, $response);
        return end($response);
    }

}