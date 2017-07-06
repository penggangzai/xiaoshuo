<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Email extends Model
{
    private $host;
    private $port=25;
    private $user;
    private $pass;
    private $debug=false;
    private $sock;
    private $mail_format=0;

    public function __construct($host,$port,$user,$pass,$format=1,$debug=1){
        $this->host=$host;
        // dd($this->host);
        $this->port=$port;
        $this->user=base64_encode($user);
        $this->pass=base64_encode($pass);
        $this->mail_format=$format;
        $this->debug=$debug;
        $this->sock=pfsockopen($this->host,$this->port,$errno,$errstr,10);
        // $this->sock = stream_socket_client("tcp://".$host.":".$port, $errno, $errstr, $connection_timeout);
        if(!$this->sock){
            exit("error,can not connet the service");
        }

        $response=fgets($this->sock);
        if(strstr($response,"220")===false){
            exit("errror,service response!");
        }
    }


    private function showMessage($message){
        if($this->debug){
            echo "<p>Debug:$message</p>\n";
        }
    }

    private function do_command($cmd,$return_code){
        fwrite($this->sock,$cmd);

        $response=fgets($this->sock);
        if(strstr($response,"$return_code")===false){
            $this->showMessage($response);
            return false;
        }
        return true;
    }

    private function is_mail($email){
        $pattren="#^[^_][\w]*@[\w.]+[\w]*[^_]$#";
        if(preg_match($pattren,$email,$mathes)){
            return true;
        }else{
            return false;
        }
    }

    public function send_mail($from,$to,$subject,$body){
        if(!$this->is_mail($from)||!$this->is_mail($to)){
            $this->showMessage("please enter vaild from/to email");
            return false;
        }

        if(empty($subject)||empty($body)){
            $this->showMessage("please enter vaild subject/body");
            return false;
        }

        $detail="From:".$from."\r\n";
        $detail.="To:".$to."\r\n";
        $detail.="Subject:".$subject."\r\n";

        if($this->mail_format==1){
            $detail.="Content-Type:text/html;\r\n";
        }else{
            $detail.="Content-Type:text/plain;\r\n";
        }

        $detail.="charset=gb2312\r\n\r\n";
        $detail.=$body;

        $this->do_command("HELO smtp.qq.com\r\n",250);
        $this->do_command("AUTH LOGIN\r\n",334);
        $this->do_command($this->user."\r\n",334);
        $this->do_command($this->pass."\r\n",235);
        $this->do_command("MAIL FROM:<".$from.">\r\n",250);
        $this->do_command("RCPT TO:<".$to.">\r\n",250);
        $this->do_command("DATA\r\n",354);
        $this->do_command($detail."\r\n.\r\n",250);
        $this->do_command("QUIT\r\n",221);

        echo "OK!!!";

        return true;

    }

}
