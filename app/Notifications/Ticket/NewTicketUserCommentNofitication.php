<?php

namespace App\Notifications\Ticket;

use App\Models\Permission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTicketUserCommentNofitication extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $ticket_comment;
    public function __construct($ticket_comment)
    {
        $this->ticket_comment = $ticket_comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => " تیکت پاسخ جدید دریافت کرده است",
            'link' => route('admin.tickets.show',$this->ticket_comment->ticket->id),
        ];
    }

    public static function notificationRecievers($permission_ability)
    {

        $roles_have_permission = Permission::where('ability',$permission_ability)->first()->roles ;

        $users_have_permission=[];
        foreach ($roles_have_permission as $role) {
            foreach ($role->users as $user) {
                $users_have_permission[]= $user;
            }
        }

        return $users_have_permission;
    }
}
