<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Test;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function mailTest(){

        $data = 'test';
        return view('pages.mail.test', compact('data'));
    }
}
