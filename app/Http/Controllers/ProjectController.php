<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;

class ProjectController extends BaseController
{
    public function comics() {
        $comics = $this->service();

        return view('projects/comics', compact('comics'));
    }

    public function details() {
        $id = key($_GET);

        $comic = $this->service('show', $id);
        $comic = $comic[0];

        return view('projects/details', compact('comic'));
    }

    public function service($function = null, $id = null) {
        $client = new Client();
        $url = '';

        switch($function){
            case 'show':
                $url = "http://gateway.marvel.com/v1/public/comics/".$id."?ts=1&apikey=a51f8d1048fa4223fc039925a3f72add&hash=709f0b239ca4bb5980f94a82e620b031";
                break;
            default:
                $url = "http://gateway.marvel.com/v1/public/comics?ts=1&apikey=a51f8d1048fa4223fc039925a3f72add&hash=709f0b239ca4bb5980f94a82e620b031";
        }
        
        $response = $client->request('GET', $url);

        $responseBody = json_decode($response->getBody());

        return $responseBody->data->results;
    }
}
