<?php 

    function getGeoLocationData(){
        $api = 'http://api.ipstack.com/check?access_key=8fee3343ad6e81bcea9d0aa76a936316';
        $data = file_get_contents ($api);
        $data = json_decode($data);
        $response = array($data->country_name, $data->city, $data->latitude, $data->longitude);

        return $response;
    }


    