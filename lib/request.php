<?php
function GET($url,$header){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    if($header) curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
    $res = json_decode(curl_exec($curl),true);
    curl_close($curl);
    return $res;
}

function POST($url,$data,$header){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($data));
    if($header) curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $res = json_decode(curl_exec($curl),true);
    curl_close($curl);
    return $res;
}
?>