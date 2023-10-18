<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \Omise_php\Omise;





class PaymentController extends Controller
{
    public function processPayment(Request $request){
        define('OMISE_API_VERSION', '2019-05-29');

        define('OMISE_PUBLIC_KEY', config('services.omise.public_key'));
        define('OMISE_SECRET_KEY', config('services.omise.secret_key'));
        session_start();
        if(!empty($_REQUEST['source'])){

            //echo $_SESSION['charge_id'].'<br>';
                 $url = 'https://api.omise.co/charges';
                //$url = 'https://api.omise.co/sources/'.$_REQUEST['soure']

                $event = \OmiseCharge::retrieve($_SESSION['charge_id']);

               // var_dump($event);exit();
                if($event["source"]["charge_status"] == 'successful'){
                     header( "location: ".$event['authorize_uri']);
                     exit(0);
                }else{
                    $img_qr = $event['source']['scannable_code']["image"]["download_uri"];
                    $aa = $event['return_uri'];
                    echo "<img src='".$img_qr."' style='width:600px;height:600px;' ><br><a href='./index.html' >กลับหน้าหลัก</a>";
                    exit(0);
                }

            }else{
                if(!empty($_REQUEST['omiseToken'])){
                    $key_token = $_REQUEST['omiseToken'];
                    $url = 'https://api.omise.co/charges';
                    $type_omise = 1;
                }else if(!empty($_REQUEST['omiseSource'])){
                    $key_token = $_REQUEST['omiseSource'];
                    $url = 'https://api.omise.co/sources/'.$key_token;
                    $type_omise = 2;
                }

        switch($type_omise){
            case(1):

            $charge = \OmiseCharge::create(array(
                'amount' => 10025,
                'currency' => 'thb',
                'card' => $_POST["omiseToken"]
            ));
            $status = $charge['status'];
            if($status == 'successful'){
                echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

                echo'	 <script>
                setTimeout(function() {
                 swal({
                     title: "Hello",
                     text: "KUY",
                     type: "success"
                 }, function() {
                     window.location = "http://127.0.0.1:8000"; //หน้าที่ต้องการให้กระโดดไป
                 });
             }, 1000);
         </script>';
            }
            break;
            case(2):
                $source = \OmiseSource::create(array(
                    'amount' => 10025,
                    'currency' => 'THB',
                    'type' => 'promptpay',
                    'download url' => "https://promptpay.io/0927081201/1.png"
                ));
                $charge2 = \OmiseCharge::create(array(
                    'amount' => 10025,
                    'currency' => 'THB',
                    // 'return_uri' =>'http://127.0.0.1:8000/omise-test/PaymentController.php?soure='.$source['id'],
                    'source' => $source['id'],

        ));

        $_SESSION['charge_id'] = $charge2['id'];
        // var_dump($charge2['source']['scannable_code']['image']['download_uri']);exit();
         $img_qr = $charge2['source']['scannable_code']['image']['download_uri'];
       if($charge2['status'] == 'pending'){
        return view('qr', ['img_qr' => $img_qr, 'authorize_uri' => $charge2['authorize_uri']]);
       }if($charge2['status'] == 'successful'){
        echo "<script>alert('Complete');</script>";
        }
            break;
        }
    }
}
}


