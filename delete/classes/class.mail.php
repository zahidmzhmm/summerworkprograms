<?php
class Mail
{
	var $Attachments;
	var $To;
	var $From;
	var $BCC;
	var $CC;
	var $Headers;
	var $Subject;
	var $Body;
	var $ReplyTo;
	
	function Mail()
	{
		$this->Attachments=array();
		$this->To="";
		$this->From="";
		$this->BCC="";
		$this->CC="";
		$this->Headers="";
		$this->Subject="";
		$this->Body="";
		$this->ReplyTo="";
	}
function getHeader()
	{
		$mime="";
		if (!empty($this->To))
			$mime .= "To: ".$this->To. "\r\n";
			
		if (!empty($this->From))
			$mime .= "From: ".$this->From. "\r\n";
		if (!empty($this->BCC))
			$mime .= "BCC: ".$this->BCC. "\r\n";
		if (!empty($this->CC))
			$mime .= "CC: ".$this->CC. "\r\n";
		if (!empty($this->ReplyTo))
			$mime .= "Reply-to: ".$this->ReplyTo. "\r\n";
		return $mime;
	}

	
	function Attach($message, $name = "", $ctype = "application/octetstream",$encoding="base64")
	{
		$this->Attachments[] = array (
						"ctype" => $ctype,
						"message" => $message,
						"name" => $name,
						"encoding"=>$encoding
						);	
	}	
	
	function buildMessage($Attachment)
	{
		$message=$Attachment["message"];
		$encoding=$Attachment["encoding"];
		$disposition="";
		if($encoding=="base64")
		{
			$message=chunk_split(base64_encode($message));
			$disposition="Content-Disposition: attachment;\r\n\r\n";
		}
		return "Content-Type: ".$Attachment["ctype"].
			($Attachment["name"]? ";\r\n\tname=\"".$Attachment["name"].
			"\"":"").
			"\r\nContent-Transfer-Encoding: $encoding\r\n$disposition\r\n$message\r\n";
	}
	
	function buildMultipart()
	{
		$date="Date: ".Date("r");
		$boundary="b".md5(uniqid(time()));
		$multipart=
		"$date\r\nMime-Version: 1.0\r\nContent-Type:multipart/mixed;\r\n boundary = \"$boundary\"\r\nX-Priority: 3\nX-MSMail-Priority: Normal\nX-Mailer: XMailer by Padma
		
		This is a MIME encoded message.\r\n\r\n--$boundary";		
		for($i=sizeof($this->Attachments)-1;$i>=0;$i--)
		{
			$multipart.="\r\n".$this->buildMessage($this->Attachments[$i])."--$boundary";
		}
		return $multipart.="--\r\n";
	}
	
	function get_mail($complete = true)
	{
		$mime = "";
		if (!empty($this->From))
			$mime .= "From: ".$this->From. "\r\n";
		if (!empty($this->BCC))
			$mime .= "BCC: ".$this->BCC. "\r\n";
		if (!empty($this->CC))
			$mime .= "CC: ".$this->CC. "\r\n";
		if (!empty($this->ReplyTo))
			$mime .= "Reply-to: ".$this->ReplyTo. "\r\n";

			
			
		if (!empty($this->Headers))
			$mime .= $this->Headers. "\r\n";
			
			
		if ($complete)
		{
			if (!empty($this->To))
			{
				$mime .= "To: $this->To\r\n";
			}
			if (!empty($this->Subject))
			{
				$mime .= "Subject: $this->Subject\r\n";
			}
		}
		
		if (!empty($this->Body))
			$this->Attach($this->Body, "", "text/HTML","7bit");
			
			$mime .=$this->buildMultipart();
	return $mime;
}

function send()
{
	$mime = $this->get_mail(false);
	$headers=$this->getHeader();
	return(mail($this->To, $this->Subject,"",$mime));
}
function send1()
{
	$mime = $this->get_mail(false);
	$headers=$this->getHeader();
	return(mail($this->To, $this->Subject, $mime,$headers));
}	
	
};


//sending mail;
/*$mail = new Mail;
$mail->To=$tran_array['name'].'<'.$tran_array['email'].'>';
$mail->From='Ezecall.com';
$mail->Subject='EzeCall Account Information';
$mail->Body="Dear" .$tran_array['name'].",<br>  
 We have sent your account login information <br>
 Account User Name:-".$pin_array['account_username']."<br>
 Account Password:-".$pin_array['account_password'] ." <br> Thank You!";
$mail->ReplyTo='';
error_reporting(0);
if($mail->send())$s_status='Yes'; else $s_status='No';*/
?>