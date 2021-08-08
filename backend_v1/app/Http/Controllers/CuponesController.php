<?php

namespace App\Http\Controllers;

use App\Models\Cupones;
use App\Models\Emisiones;
use Illuminate\Support\Facades\DB;

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

    public function mailtest() 
    {
    
        $details = [ 'nombre' => "emi", 'mail' => "emi@mgial.com",'cupon_desc'=>'lalalalalal', 'proveedor_nombre' => 'proveedor_nombre', 'proveedor_direccion' => 'proveedor_direccion', 'proveedor_tel' =>'proveedor_tel' ];
        \Mail::to("emilianocarasa@gmail.com")->send(new \App\Mail\MailVoucher($details));
    
    }

    public function getCuponesDisponibles_de_Limitados(){

            // busco promedio de cantidad de cupones disponibles ( para que no se agoten los que tienen 1 o 2, matamos los primeros de 20 o >)
            //$avg_disp = DB::select("SELECT FLOOR(AVG(`v_diponibilidad_cupones_nonstop`.`disponibles`)) as avg_disp FROM `v_diponibilidad_cupones_nonstop` ORDER BY `v_diponibilidad_cupones_nonstop`.`disponibles` ASC",[]);

            $Cupones_a_Sortear = DB::select("SELECT id FROM v_diponibilidad_cupones_nonstop v where v.disponibles >= ?",[0]);
            
            $whereINClause = array();
            foreach ($Cupones_a_Sortear as $cas){
                array_push($whereINClause, $cas->id);
            }

            return $whereINClause;

    }


    public function getCupon_demo(Request $request)
    {

        //dd($request);

        // valido datos
        //$validator = Validator::make($request->all(), [ 'email' => 'required', 'lastName' => 'required', 'name' => 'required' ]);
        
        //if ($validator->fails()) { 
        //    $NewCupon = array( 'success' => 'false', 'mensaje' => 'Faltan datos.');
        // }
        
        $ip = $_SERVER['REMOTE_ADDR']; // 127.0.0.1
        $yaEmitimos = Emisiones::where('mail', $request->get('form_fields[email]'))->get();

        if ( count($yaEmitimos) > 0 ) {
            $NewCupon = array( 'success' => 'false', 'mensaje' => 'Ya tenes un cupon asociado a esta cuenta de correo.');
            //return response()->json($NewCupon);
        }

        // start. logica de calculo para los cupones
        /*
            1.Cuantos emitimos de los non-stop ??
            2. < menos de XX, emitimos solo de <NON-STOP>
            3. = 100 o 200 o 300 ? emitimos de los <> a NON-STOP
        */

        try {
            $cuponGanadorEloquent = Cupones::where('provincia', '=', 'CABA')->inRandomOrder()->limit(1);

            // select c.metadata, count(e.id) as cantidad from cupones c left join emisiones e on c.id = e.rela_cupon where c.metadata= 'NON-STOP' group by c.metadata

            $data = DB::table('cupones')->leftjoin('emisiones', 'cupones.id', '=', 'emisiones.rela_cupon')
                                    ->select( DB::raw('count(emisiones.id) as cantidad'))
                                    ->get();
        
            $cadaCuanto = array(100,200,300,400,500,600,700,800,900,1000,1100,1200,1300,1400,1500,1600);
                
            if (!in_array($data[0]->cantidad, $cadaCuanto)) {
                $cuponGanadorEloquent->where('cupones.metadata', '=', 'NON-STOP');
            } else {
                $cuponGanadorEloquent->whereIn('cupones.id', $this->getCuponesDisponibles_de_Limitados());
            }

            // end. logica de calculo para los cupones
            $cuponGanador = $cuponGanadorEloquent->get();
                
            $NewCupon = array( 'nombre' => $request->get('form_fields[name]'),
                                    'apellido' => $request->get('form_fields[lastName]'),
                                    'mail' => $request->get('form_fields[email]'),
                                    'ip' => $ip,
                                    'metadata' => '',
                                    'rela_cupon' => $cuponGanador[0]['id'],
                                    'cupon' => $cuponGanador->toArray(),
                                    'proveedor' => $cuponGanador[0]->getProveedor,
                                    'metadata' => '',
                                    'data' => '' );

            $emision = Emisiones::create($NewCupon);
        }catch(Exception $e){
            print_r($cuponGanador);
            print_r($e->getMessage());
            die();
        }
        unset($NewCupon['metadata']);
        unset($NewCupon['data']);
        unset($NewCupon['rela_cupon']);
        unset($NewCupon['ip']);

        $html= '<div class="usuario-ganador"><h2>'.$request->get('form_fields[name]'). ' '. $request->get('form_fields[lastName]') .'</h2>
                <p>'.$request->get('form_fields[email]').'</p></div><div class="premio"><div class="ganaste-container"><span class="ganaste">GANASTE</span></div>
                <p class="premio-title">'.$cuponGanador[0]['descripcion'].'<br><span class="en">en</span></br></p>
                <div class="local-voucher"><div class="imagen-voucher"><img src="'.$cuponGanador[0]->getProveedor->data_1.'" width="200"></div>
                <div class="info-voucher"><h2>'.$cuponGanador[0]->getProveedor->nombre.'</h2>
                <p>Direcci贸n: '.$cuponGanador[0]->getProveedor->direccion.' </p><p>Tel: '.$cuponGanador[0]->getProveedor->telefono.' </p></div></div></div>';

        $NewCupon['html'] = $html;
        $NewCupon['success'] = true;

        
        $details = [
            'nombre' => $request->get('form_fields[name]'). ' '. $request->get('form_fields[lastName]'),
            'mail' => $request->get('form_fields[email]'),
            'cupon_desc' => $cuponGanador[0]['descripcion'],
            'url_img' => 'https://flexit.com.ar/madryn/madryn/backend_v1/public/',
            'img_proveedor' => $cuponGanador[0]->getProveedor->data_1,
            'proveedor_nombre' => $cuponGanador[0]->getProveedor->nombre,
            'proveedor_direccion' => $cuponGanador[0]->getProveedor->direccion,
            'proveedor_tel' => $cuponGanador[0]->getProveedor->telefono
        ];
       
                
       \Mail::to( trim($request->get('form_fields[email]')) )->send(new \App\Mail\MailVoucher($details));
       
        return response()->json($NewCupon);

    }



     public function sendCorreo($to_name, $to_mail, $cupon){

        $data = array(
            'url' => 'https://flexit.com.ar/madryn/madryn/backend_v1/public/',
            'cupon' => $cupon
        );
        
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_mail) {
            $message->to($to_mail, $to_name)->subject('Voucher - Me emociona Madryn');
            $message->from('noreply@meemocionamadryn.com.ar','Me Emociona Madryn');
        });


    } 



}
