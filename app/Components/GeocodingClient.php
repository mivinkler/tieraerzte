<?php

namespace App\Components;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GeocodingClient
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://maps.googleapis.com/maps/api/geocode/json',
            'timeout'  => 2.0,
        ]);
        $this->apiKey = env('GOOGLE_MAPS_API_KEY');
    }

    /**
    *
    * @param string $address
    * @return array|null
    */
   public function getCoordinatesByAddress(string $address): ?array
   {
       try {
           $response = $this->client->request('GET', '', [
               'query' => [
                   'address' => $address,
                   'key' => $this->apiKey
               ]
           ]);
   
           $data = json_decode($response->getBody()->getContents(), true);
   
           if (!empty($data['results']) && $data['status'] == 'OK') {
               return [
                   'latitude' => $data['results'][0]['geometry']['location']['lat'],
                   'longitude' => $data['results'][0]['geometry']['location']['lng']
               ];
           }
       } catch (\Exception $e) {
           Log::error("Error contacting Google Geocoding API: " . $e->getMessage());
       }
   
       return null;
   }
}

