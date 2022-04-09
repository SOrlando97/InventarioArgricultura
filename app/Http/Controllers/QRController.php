<?php

namespace App\Http\Controllers;

use Image;
use Zxing\QrReader;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function index()
    {
        return view('QR.QR');
    }
    public function LeerQR(Request $request)
    {
        $qrcode= new QrReader($_FILES['qrimage']['tmp_name']);
        $text= $qrcode->text();
        if($text == ""){
            return "Tamaño de imagen no soportado";
        }
        return redirect($text);
    }
}