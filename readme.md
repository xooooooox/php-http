```php
<?php

use xooooooox\http\client\Curl;

// GET
$url = 'https://www.example.com/';
$header = [
    'Content-Type: application/json',
];
$result = Curl::Get($url,$header);
var_dump($result);

// POST
$url = 'https://www.example.com/';
$header = [
    'Content-Type: application/json',
    'Signature: 84F59E424D12180777D19E60229A505D',
];
$bodies = [
    'name' => 'Jack',
    'age' => 18,
];
$body = json_encode($bodies);
$result = Curl::Post($url,$body,$header);
var_dump($result);

// Only get response header
$url = '';
$body = '';
$header = [
    'Signature: 84F59E424D12180777D19E60229A505D',
];
$responseHeader = Curl::GetHeader(Curl::Post($url,$body,$header));
var_dump($responseHeader);

// Only get response body
$url = '';
$body = '';
$header = [
    'Signature: 84F59E424D12180777D19E60229A505D',
];
$responseBody = Curl::GetBody(Curl::Post($url,$body,$header));
var_dump($responseBody);

// Get response all
$url = '';
$body = '';
$header = [
    'Signature: 84F59E424D12180777D19E60229A505D',
];
$responseAll = Curl::GetAll(Curl::Post($url,$body,$header));
var_dump($responseAll);

```
