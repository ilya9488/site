<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	// От кого
	$mail->setFrom('ilya.orel8@gmail.com', 'Будущий фрилансер');
	// Кому отправить
	$mail->addAddress('ilya.orel9488@gmail.com');
	// Тема письма
	$mail->Subject = 'Привет! Это тот человек который смог создать форму отправки писем !';
	// Рука пропустим 

	// Тело письма 
/*	$body = '<h1>Встречайте письмо!</h1>';*/

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['phone']))){
		$body.='<p><strong>Email:</strong> '.$_POST['phone'].'</p>';
	}
/*	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}*/

// Прикрепить файл пропустим

// Отправляем 

if (!$mail->send()) {
	$message = 'Ошибка';
} else {
	$message = 'Данные отправлены!';
}

 $responsive = ['message' => $message];

 header('Content-type: application/json');
 echo json_encode($responsive);

 ?>