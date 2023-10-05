<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Mail;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

  public function notification()
  {
    $data = [
      "subject"=>"hello ku k he",
      "body"=>"Hello friends, Welcome to ชิงร้อยชิงล้าน"
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
