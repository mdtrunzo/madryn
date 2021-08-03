<?php

namespace App\Http\Controllers;

use App\Models\Cupones;
use App\Models\Emisiones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuponesController extends Controller
{

    public function indexCaba() {
        return view('caba');
    }

    public function indexMadryn() {
        return view('madryn');
    }
    


    public function index() {

        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        print_r($details);



    }


    public function getCupon_demo1(Request $request)
    {

         $cupon = array(
            "id" => 1,
            "prestador"=> "Nievemar",
            "premio"=> "2x1 en excursión regular (medio día) a El Doradillo o en su defecto (por fin de temporada) a Punta Loma",
            "direccion"=> "Italia 20, Trelew, Chubut",
            "telefono"=> "0280 443-4114",
            "img"=> "img/nievemar.png"
         );

         return response()->json($cupon);

    }



    public function getCupon_demo(Request $request)
    {
        
        // valido datos
        $validator = Validator::make($request->all(), [ 'email' => 'required', 'lastName' => 'required', 'name' => 'required' ]);
        if ($validator->fails()) { abort(400); }
        
        $ip = $_SERVER['REMOTE_ADDR']; // 127.0.0.1

        $cuponGanador = Cupones::inRandomOrder()->limit(1)->get();
  
        $NewCupon = array( 'nombre' => $request->get('name'),
                            'apellido' => $request->get('lastName'),
                            'mail' => $request->get('email'),
                            'ip' => $ip,
                            'metadata' => '',
                            'rela_cupon' => $cuponGanador[0]['id'],
                            'cupon' => $cuponGanador->toArray(),
                            'proveedor' => $cuponGanador[0]->getProveedor,
                            'metadata' => '',
                            'data' => '' );

        $emision = Emisiones::create($NewCupon);

        unset($NewCupon['metadata']);
        unset($NewCupon['data']);
        unset($NewCupon['rela_cupon']);
        unset($NewCupon['ip']);

        $html= '<div class="usuario-ganador">
                <h2>'.$request->get('name'). ' '. $request->get('lastName') .'</h2>
                <p>'.$request->get('email').'</p>
                </div>
                <div class="premio">
                <div class="ganaste-container">
                <span class="ganaste">GANASTE</span>
                </div>
                <p class="premio-title">'.$cuponGanador[0]['descripcion'].'<br>en</br></p>
                <div class="local-voucher">
                    <div class="imagen-voucher">
                    <img src="'.$cuponGanador[0]->getProveedor->data_1.'" width="200">
                    </div>
                    <div class="info-voucher">
                    <h2>'.$cuponGanador[0]->getProveedor->nombre.'</h2>
                    <p>Dirección: '.$cuponGanador[0]->getProveedor->direccion.' </p>
                    <p>Tel: '.$cuponGanador[0]->getProveedor->telefono.' </p>
                    </div>
                </div>
                </div>';

                $NewCupon['html'] = $html;


        return response()->json($NewCupon);



    }





}
