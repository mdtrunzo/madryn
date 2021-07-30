<?php

namespace App\Http\Controllers;

use App\Models\Cupones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuponesController extends Controller
{





    public function getCupon(Request $request)
    {

         return json_encode(array(
            "id" => 1,
            "prestador"=> "Nievemar",
            "premio"=> "2x1 en excursión regular (medio día) a El Doradillo o en su defecto (por fin de temporada) a Punta Loma",
            "direccion"=> "Italia 20, Trelew, Chubut",
            "telefono"=> "0280 443-4114",
            "img"=> "img/nievemar.png"
         ));

        // validamos que vengan los datos del form
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required',
            'nombre' => 'required'
        ]);
         
        if ($validator->fails()) {
             abort(400);
        }
        
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        print_r($details);


    }






}
