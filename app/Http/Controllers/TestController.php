<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Test;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function mailTest(){

        $data = 'test';
        // Mail::to('bagusgandhi4@gmail.com')->send(new Test($data));
        return view('pages.mail.test', compact('data'));
    }
}
