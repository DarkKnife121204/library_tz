<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReturnBook extends Notification
{
    use Queueable;
    public function __construct(public $mailData)
    {
        $this->mailData = $mailData;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Срок Аренды')
                    ->greeting('Привет '.$this->mailData['name'].'!')
                    ->line('Не забудьте вернуть книгу: '.$this->mailData['book'] . ' за день до окончания срока аренды.')
                    ->line('Спасибо за использование нашей библиотеки!');
    }
}
