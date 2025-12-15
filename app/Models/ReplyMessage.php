<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

use Mail;

class ReplyMessage extends Model
{
    public static function SendMessage($body,$subject,$name,$to,$id,$from){
      //The Generic mailler Goes here
      $data = array(
        'name'=>$name,
        'subject'=>$subject,
        'messageAppend'=>$body
    );
    $appName = config('app.name');
    $appEmail = config('mail.username');


    $FromVariable = $from;
    $FromVariableName = $name;

    $toVariable = $to;
    $toVariableName = $name;


    Mail::send('mail', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName){
        $message->from($FromVariable , $FromVariableName);
        $message->to($toVariable, $toVariableName)->cc('henry@creationltd.co.ke')->cc('info@creationltd.co.ke')->bcc('albertmuhatia@gmail.com')->replyto($FromVariable)->subject($subject);

});
  $updateDetail = array(
      'status' => 1
  );
  DB::table('messages')->where('id',$id)->update($updateDetail);
  return back();
    }

    public static function mailSubscriber(){

    }

    public static function mailSubscribers(){

    }

    public static function mailrequest($name,$email,$service,$price,$content,$budget){
        //The Generic mailler Goes here
        $data = array(
            'name'=>$name,
            'email'=>$email,
            'content'=>$content,
            'service'=>$service,
            'budget'=>$budget,
            'price'=>$price,
        );
        $subject = "Quote Request";
        $appName = config('app.name');
        $appEmail = config('mail.username');


        $FromVariable = $appEmail;
        $FromVariableName = $appName;

        $toVariable = 'albertmuhatia@gmail.com';
        $toVariableName = 'Albert Muhatia';


        Mail::send('mailQuote', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->cc('henry@creationltd.co.ke')->cc('info@creationltd.co.ke')->cc('joan@creationltd.co.ke')->subject($subject);
        });
    }
}
