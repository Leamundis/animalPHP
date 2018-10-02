<?php

namespace Model;
use GuzzleHttp\Client;

class Cat
{
    public function getOne()
    {
        $client = new Client(['base_uri' => 'https://randomfox.ca']);

        $res = $client->request('GET', '/floof');
        var_dump($res); die;
        return (string) $res->getBody();
    }
}