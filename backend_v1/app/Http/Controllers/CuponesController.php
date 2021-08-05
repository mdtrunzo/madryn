<?php

namespace App\Http\Controllers;

use App\Models\Cupones;
use App\Models\Emisiones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

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


/*     public function getCupon_demo1(Request $request)
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

    } */



    public function getCupon_demo(Request $request)
    {

        $cuponnnnn = array(
            "id" => 1,
            "prestador"=> "Nievemar",
            "premio"=> "2x1 en excursión regular (medio día) a El Doradillo o en su defecto (por fin de temporada) a Punta Loma",
            "direccion"=> "Italia 20, Trelew, Chubut",
            "telefono"=> "0280 443-4114",
            "img"=> "img/nievemar.png"
         );

        // valido datos
        $validator = Validator::make($request->all(), [ 'email' => 'required', 'lastName' => 'required', 'name' => 'required' ]);
        
        if ($validator->fails()) { 
            $NewCupon = array( 'success' => 'false', 'mensaje' => 'Faltan datos.');
            return response()->json($NewCupon);
         }
        
        $ip = $_SERVER['REMOTE_ADDR']; // 127.0.0.1
        $yaEmitimos = Emisiones::where('mail', $request->get('email'))->get();

        if ( count($yaEmitimos) > 0 ) {
            $NewCupon = array( 'success' => 'false', 'mensaje' => 'Ya tenés un cupon asociado a esta cuenta de correo.');
            return response()->json($NewCupon);
        }

        $cuponGanador = Cupones::where('provincia','=','CABA')->inRandomOrder()->limit(1)->get();
  
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
        $NewCupon['success'] = true;


        /*  
        $details = [
            'nombre' => $request->get('name'). ' '. $request->get('lastName'),
            'mail' => $request->get('email'),
            'proveedor_nombre' => $cuponGanador[0]->getProveedor->nombre,
            'proveedor_direccion' => $cuponGanador[0]->getProveedor->direccion,
            'proveedor_tel' => $cuponGanador[0]->getProveedor->telefono
        ];
       
        \Mail::to($request->get('email'))->send(new \App\Mail\MailVoucher($details)); */
       
        return response()->json($NewCupon);

    }



/*     public function sendCorreo($to_name, $to_mail, $cupon){

        $data = array(
            'url' => 'https://flexit.com.ar/madryn/madryn/backend_v1/public/',
            'cupon' => $cupon
        );
        
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_mail) {
            $message->to($to_mail, $to_name)->subject('Voucher - Me emociona Madryn');
            $message->from('noreply@flexit.com.ar','Me Emociona Madryn');
        });


    } */



}
