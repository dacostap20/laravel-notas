<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiNombresController extends Controller
{
    //
    public function getData(Request $request)
    {
        $client = new Client([
            'verify' => false,
        ]);

        $res = $client->get('https://randomuser.me/api/?results=5');
        $data = json_decode($res->getBody());

        $totalLetras = array();
        foreach ($data->results as $result) {
            $nombre = $result->name->first . ' ' . $result->name->last;
            $nombre = strtolower($nombre);
            for ($i = 0; $i < strlen($nombre); $i++) {
                if (ctype_alpha($nombre[$i])) {
                    if (isset($totalLetras[$nombre[$i]])) {
                        $totalLetras[$nombre[$i]]++;
                    } else {
                        $totalLetras[$nombre[$i]] = 1;
                    }
                }
            }
        }

        arsort($totalLetras);
        $letraMasUsada = array_keys($totalLetras)[0];

        if($request->ajax()){
            return response()->json([
                'letraMasUsada' => $letraMasUsada,
                'lista' => $data->results,
            ]);
        }
    }
    public function vistaGet(){
        return view('vistaApi');
    }
}
