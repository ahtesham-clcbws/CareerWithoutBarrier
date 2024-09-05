<?php

namespace App\Notifications;

use App\Models\ContactInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log; 

class ContactInfoReplyMail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $contactInfo;
    public $message;

    public function __construct($contactInfo, $message)
    {
        $this->contactInfo = $contactInfo;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $contactInfo = $this->contactInfo;
        $message = $this->message;
        
        return (new MailMessage)
        ->subject('Reply: ')
        ->markdown('mail.contact.replyNotification',compact('contactInfo','message'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
