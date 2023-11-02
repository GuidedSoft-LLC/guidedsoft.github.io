<?php
class PHP_Email_Form
{
  public $to = 'info@shaikwahab.com'; // Replace with your receiving email address
  public $from_name;
  public $from_email;
  public $subject;
  public $message;
  public $headers;
  public $success_message = "Your message has been sent. Thank you!";
  public $error_message = "An error occurred while sending the message. Please try again later.";
  public $smtp = false; // Set this to true if you want to use SMTP

  public function send()
  {
    $this->prepare_headers();

    if ($this->smtp) {
      return $this->send_with_smtp();
    } else {
      return $this->send_with_mail();
    }
  }

  private function prepare_headers()
  {
    $this->headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
    $this->headers .= "Reply-To: {$this->from_email}\r\n";
    $this->headers .= "MIME-Version: 1.0\r\n";
    $this->headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  }

  private function send_with_mail()
  {
    if (mail($this->to, $this->subject, $this->message, $this->headers)) {
      return $this->success_message;
    } else {
      return $this->error_message;
    }
  }

  private function send_with_smtp()
  {
    // If you want to use SMTP, implement your SMTP sending logic here.
    // You'll need to set up an SMTP server and provide the necessary credentials.
    // You can use a library like PHPMailer to handle SMTP email sending.
    // Example:
    // require 'PHPMailerAutoload.php';
    // $mail = new PHPMailer;
    // $mail->isSMTP();
    // $mail->Host = 'example.com';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'example';
    // $mail->Password = 'pass';
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 587;
    // $mail->From = $this->from_email;
    // $mail->FromName = $this->from_name;
    // $mail->addAddress($this->to);
    // $mail->isHTML(true);
    // $mail->Subject = $this->subject;
    // $mail->Body = $this->message;
    // if ($mail->send()) {
    //     return $this->success_message;
    // } else {
    //     return $this->error_message;
    // }

    return $this->error_message; // Replace with your SMTP sending code
  }
}
