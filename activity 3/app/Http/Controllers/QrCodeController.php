<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    // Show QR Code in the browser directly
    public function showQrCode()
    {
        return QrCode::size(200)->generate('https://example.com');
    }

    // Show QR Code inside a Blade view
    public function qrInView()
    {
        $qr = QrCode::size(250)->generate('Laravel QR Code Example');
        return view('qrcode', compact('qr'));
    }

    // Save QR Code as image in public/images
    public function saveQrCode()
    {
        QrCode::format('png')
              ->size(300)
              ->generate('Save this QR', public_path('images/qrcode.png'));

        return 'QR code image saved to public/images/qrcode.png';
    }
}
