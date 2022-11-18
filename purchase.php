<?php

checkout();

function checkout()
{
    $checkout = httpPost('https://bitpave.com/api/checkout/create', [
        'client' => 'client_id',
        'client_secret' => 'client_secret',
        'name' => 'Tesla Model Y',
        'icon' => 'https://media.autoweek.nl/m/2moyzhpb33tk.jpg',
        'price' => 65000,
        'wallet' => 'bc1qpy8vlun5fah906h87wwyussshjmtndyv55dlaf',

        'success_url' => 'https://example.com/store/',
        'cancel_url' => 'https://example.com/store?method=cancelled',
        'callback_url' => 'https://example.com/store/callback.php',
    ]);

    return redirect($checkout->checkout_url);
}

function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
}

function redirect($location)
{
    header('Location: '.$location);
}
