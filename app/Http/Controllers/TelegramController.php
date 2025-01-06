<?php

namespace App\Http\Controllers;

use App\Jobs\SendTelegramMessageJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    protected $botToken = '7955493307:AAFPiLc7DtJx3iBIkkRAiDxvlIcJjMeyWrA'; 
    protected $chatId = '7848881961';

    public function sendMessage(Request $request)
    {
        $data  = [
            'if_sh' => $request->input('if_sh'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message')
        ];
    
        dispatch(new SendTelegramMessageJob($this->botToken, $this->chatId, $data));
    
        return response()->json('Maktab Rahbaryatiga habar ketdi');
    }
}