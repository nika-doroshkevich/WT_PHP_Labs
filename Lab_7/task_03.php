<?php
function openweather()
{
    header('Content-Type: text/html;charset=UTF-8');
    $city = "Minsk";
    $mode = "json";
    $units = "metric";
    $countDay = 9;
    $appID = '';
    $url = "http://api.openweathermap.org/data/2.5/forecast?q=$city&units=$units&cnt=$countDay&appid=$appID";

    $data = @file_get_contents($url);
    if ($data) {
        $dataJson = json_decode($data);
        $arrayDays = $dataJson->list;
        $oneDay = $arrayDays[8];
        $result = [];
        $result[] = $oneDay->main->temp_min;
        $result[] = $oneDay->main->temp_max;
        return $result;
    } else {
        echo "Server is not available!";
    }
}

function bestweather()
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://bestweather.p.rapidapi.com/weather/Minsk?unitGroup=metric",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: bestweather.p.rapidapi.com",
            "X-RapidAPI-Key: "
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $response = json_decode($response);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $result = [];

        $result[] = $response->days[1]->tempmin;
        $result[] = $response->days[1]->tempmax;
        return $result;
    }
}

function weathermap()
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/forecast/daily?q=Minsk&lat=35&lon=139&cnt=1&units=metric",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: community-open-weather-map.p.rapidapi.com",
            "X-RapidAPI-Key: "
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $response = json_decode($response);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $result = [];
        $result[] = $response->list[0]->temp->min;
        $result[] = $response->list[0]->temp->max;
        return $result;
    }
}

function weatherapi()
{

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://weatherapi-com.p.rapidapi.com/forecast.json?q=Minsk&days=1&dt=2022-05-21",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: weatherapi-com.p.rapidapi.com",
            "X-RapidAPI-Key: "
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $response = json_decode($response);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $result = [];
        $result[] = $response->forecast->forecastday[0]->day->mintemp_c;
        $result[] = $response->forecast->forecastday[0]->day->maxtemp_c;
        return $result;
    }
}

function yahoo()
{

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://yahoo-weather5.p.rapidapi.com/weather?location=Minsk&format=json&u=c",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: yahoo-weather5.p.rapidapi.com",
            "X-RapidAPI-Key: "
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $response = json_decode($response);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $result = [];
        $result[] = $response->forecasts[1]->low;
        $result[] = $response->forecasts[1]->high;
        return $result;
    }
}

$t1 = openweather();
$t2 = bestweather();
$t3 = weathermap();
$t4 = weatherapi();
$t5 = yahoo();
$min = ($t1[0] + $t2[0] + $t3[0] + $t4[0] + $t5[0]) / 5;
$max = ($t1[1] + $t2[1] + $t3[1] + $t4[1] + $t5[1]) / 5;
echo "Weather forecast on next day: the lowest temprature - $min, the highest - $max.";
