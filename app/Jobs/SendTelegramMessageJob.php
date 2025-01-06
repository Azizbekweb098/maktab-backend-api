<?php

namespace App\Jobs;

use \Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendTelegramMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $botToken;
    protected $chatId;
    protected $messageData;

    public function __construct($botToken, $chatId, $messageData)
    {
        $this->botToken = $botToken;
        $this->chatId = $chatId;
        $this->messageData = $messageData;
    }
// SendTelegramMessageJob.php
public function handle()
{


    $if_sh = $this->messageData['if_sh'] ?? 'Nomaʼlum';
    $email = $this->messageData['email'] ?? 'Nomaʼlum';
    $subject = $this->messageData['subject'] ?? 'Nomaʼlum';
    $message = $this->messageData['message'] ?? 'Nomaʼlum';

    Http::post("https://api.telegram.org/bot" . $this->botToken . "/sendMessage", [
        'chat_id' => $this->chatId,
        'text' => sprintf(
            "I.F.Sh: %s\nE.pochta: %s\nMavzu: %s\nXabar: %s",
            $if_sh,
            $email,
            $subject,
            $message
        )
    ]);
}

}
