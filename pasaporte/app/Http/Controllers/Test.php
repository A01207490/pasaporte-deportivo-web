<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Generator;

class Test extends Controller
{
    public function show()
    {
        QrCode::generate('Make me into a QrCode!');
    }
}
