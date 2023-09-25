<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NotificationMail;

class MailController extends Controller
{

  public function notification()
  {
    $data = [
      "subject"=>"hello ku k he",
      "body"=>"Hello friends, Welcome to ชิงร้อยชิงล้าน
      https://prod.liveshare.vsengsaas.visualstudio.com/join?D2FC471B577727C7B26E407A46457ABE548C"
      ];
    // MailNotify class that is extend from Mailable class.
    try
    {
      Mail::to('65070037@kmitl.ac.th')->send(new NotificationMail($data));
      return response()->json(['Great! Successfully send in your mail']);
    }
    catch(Exception $e)
    {
      return response()->json(['Sorry! Please try again latter']);
    }
  }
}
