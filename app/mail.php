<?php
header("Content-type: text/html; charset=utf-8");
if(isset($_POST['action']) && $_POST['action'] == 'submitform')

{
  
  $name = $_POST['name'];
  $tel = $_POST['tel'];
  //optional
  $email = (isset($_POST['email'])) ? $_POST['email'] : 'none email provided!';
  $pack = (isset($_POST['pack'])) ? $_POST['pack'] : 'none pack provided';
  //
  $ip = gethostbyname($_SERVER['REMOTE_ADDR']); 

    $to = 'maksjay@gmail.com,shakirov.vadimka@bk.ru';
    $subject = "Форма обратной связи";
     
    //headers and subject
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: SolidLabs Automailer <support@solid-labs.ru>\r\n";
    
    $body = "Новый запрос по форме обратной связи<br />";
    $body .= "Имя: ".$name."<br />";
    $body .= "Телефон: ".$tel."<br />";
    if(isset($_POST['email'])) { $body .= "Почта: ".$email."<br />"; } 
    if(isset($_POST['pack'])) { $body .= "Что заказали: ".$pack."<br />"; }   
    $body .= "IP: ".$ip."<br />";
    
    $send = mail($to, $subject, $body, $headers);
    
    //ok message
    
   if ($send == 'true')
{ echo json_encode(array('success' => 1, 'id' => $code)); }else{ echo json_encode(array('success' => 0, 'text' => 'Не удалось отправить сообщение'));  }
   
}

?>