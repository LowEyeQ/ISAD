<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        if ($this->data['topic'] === 'Videocall') {
            // ถ้า topic เป็น 'VideoCall' ให้เปลี่ยน subject และ view เป็นของ VideoCall
            $subject = 'วีดีโอคอล'; // กำหนด subject ใหม่
            return $this->subject($subject)
                ->view('emails.noti_videocall')
                ->with([
                    'time' => $this->data['time'],
                    'date' => $this->data['date'],
                    'firstname' =>   $this->data['firstname'],
                    'lastname' =>  $this->data['lastname'],
                    'reason' => $this->data['reason'],
                    'date_appoint' => $this->data['date_appoint'],
                    'time_end' =>  $this->data['time_end'],
                    'time_start' => $this->data['time_start'],
                    // ส่งข้อมูลอื่น ๆ ที่คุณต้องการนำไปใช้ใน .blade ได้ที่นี่
                ]);// เปลี่ยนเป็น view ของ VideoCall

        }else{

            $subject = 'นัดหมาย';
            return $this->subject($subject)
            ->view('emails.noti_appointment')
            ->with([
                'time' => $this->data['time'],
                'date' => $this->data['date'],
                'firstname' =>   $this->data['firstname'],
                'lastname' =>  $this->data['lastname'],
                'reason' => $this->data['reason'],
                'date_appoint' => $this->data['date_appoint'],
                'petname' => $this->data['petname'],
                'time_appoint' => $this->data[ 'time_appoint'],
                // ส่งข้อมูลอื่น ๆ ที่คุณต้องการนำไปใช้ใน .blade ได้ที่นี่
            ]);
        }
    }
    }

