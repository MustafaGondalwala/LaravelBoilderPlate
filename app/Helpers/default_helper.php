<?php

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

function encrypt_param($parameter)
{
    if ($parameter == null) {
        return null;
    }

    return Crypt::encryptString($parameter);
}
function decrypt_param($parameter)
{
    if ($parameter == null) {
        return null;
    }
    try {
        $decrypt_parameter = Crypt::decryptString($parameter);
    } catch (DecryptException $e) {
        return $parameter;
    }

    return $decrypt_parameter;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) {
        return $min;
    } // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);

    return $min + $rnd;
}
function getToken($length = 10)
{
    $token = '';
    $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
    $codeAlphabet .= '0123456789';
    $max = strlen($codeAlphabet); // edited

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1)];
    }

    return $token;
}
function successResponse($data)
{
    return response()->json([
        'success' => true,
        'data' => $data,
    ], 200);
}
function errorResponse($data)
{
    return response()->json([
        'success' => false,
        'data' => $data,
    ], 400);
}

function custom($string)
{
    return config('custom.'.$string);
}

function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function uploadFile($file, $path)
{
    $filename = pathinfo(clean($file->getClientOriginalName()), PATHINFO_FILENAME).'-'.rand(1, 1000000).'.'.$file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs(
        $path,
        $file,
        $filename
    );

    return url('storage'.$path.$filename);
}

function uploadUrlToStorage($url, $path)
{
    try{
        $ext = pathinfo($url, PATHINFO_EXTENSION); 
        $name =pathinfo($url, PATHINFO_FILENAME);
        $filename = pathinfo(clean($name), PATHINFO_FILENAME).'-'.rand(1, 1000000).'.'.$ext;
        $contents = file_get_contents($url);
    
        Storage::disk('public')->put(
            $path.$filename,
            $contents
        );
        return url('storage'.$path.$filename);
    }catch(\Exception){
        logger()->error("Error in File Download ",['url' =>  $url, 'path' =>$path]);
        return "";
    }
}
