<?php 

$to      = "shushakov@gmail.com";
// $to      = "my@bernerandstafford.ru"; // Адрес1 куда шлем письмо
// $to2      = "ak@bernerandstafford.ru"; // Адрес2 куда шлем письмо
$subject = "Lead Generation - заявка на презентацию."; // Тема письма - заголовок


$last_name = $_POST['last_name'];
$name    = $_POST['name'];
$father_name = $_POST['father_name'];
$company = $_POST['company'];
$oc    = $_POST['oc'];
$phone_number = $_POST['phone_number'];
$email   = $_POST['email'];
$subject = "=?windows-1251?b?" . base64_encode($subject) . "?=";
$Date = date(DATE_RFC822);


/// Проверка правильности ввода E-MAIL

if (!preg_match("/[0-9a-z_]+@[0-9a-z_\-^\.]+\.[a-z]{2,6}$/i",$email)){
echo '<center><h1>неправильно введен адрес эл почты, или не введен !!</h1><br><b>Вы ввели:</b><i>';
$email=trim($email); //удал пробелы
$email=htmlspecialchars($email); //удаляем теги html
echo "$email</i>";
echo "<br><a href=# onClick='history.back()'>назад</a></center>";
exit();
}
// Проверка правильности ввода E-MAIL



$To          = strip_tags($to);
$To2          = strip_tags($to2);
$FromName    =strip_tags($name);
$FromEmail   =strip_tags($email);
$From = "=?windows-1251?b?" . base64_encode($FromName) . "?= <" . $FromEmail . ">";
$last_name1 = strip_tags($last_name);
$father_name1 = strip_tags($father_name);
$company1 = strip_tags($company);
$oc1    = strip_tags($oc);
$phone_number1 = strip_tags($phone_number);
$vendors = '';

if(!empty($_POST['vendor1']) )
  $vendors .= "Terrasoft <br/>\n";
if(!empty($_POST['vendor2']) )
  $vendors .= "1C: CRM <br/>\n";
if(!empty($_POST['vendor3']) )
  $vendors .= "Qsoft CRM <br/>\n";
if(!empty($_POST['vendor4']) )
  $vendors .= "SalesForce <br/>\n";
if(!empty($_POST['vendor5']) )
  $vendors .= "Мегаплан <br/>\n";
if(!empty($_POST['vendor6']) )
  $vendors .= "РосБизнесСофт <br/>\n";
if(!empty($_POST['vendor7']) )
  $vendors .= "Microsoft Dynamics CRM <br/>\n";
if(!empty($_POST['vendor8']) )
  $vendors .= "Нужна консультация <br/>\n";

if($vendors=='')
	$vendors='Вендоры не выбраны';




$Subject     =strip_tags($subject);

$boundary1   =rand(0,9)."-"
.rand(10000000000,9999999999)."-"
.rand(10000000000,9999999999)."=:"
.rand(10000,99999);
$boundary2   =rand(0,9)."-".rand(10000000000,9999999999)."-"
.rand(10000000000,9999999999)."=:"
.rand(10000,99999);

$attach="";
 
for($i=0; $i < count($_FILES['fileatt']['name']); $i++){

if(is_uploaded_file($_FILES['fileatt']['tmp_name'][$i]) &&
   !empty($_FILES['fileatt']['size'][$i]) &&
   !empty($_FILES['fileatt']['name'][$i])){
    
$attach      ='yes';
$end         ='';

   $handle      =fopen($_FILES['fileatt']['tmp_name'][$i], 'rb');
   $f_contents  =fread($handle, $_FILES['fileatt']['size'][$i]);
   $attachment[]=chunk_split(base64_encode($f_contents));
   fclose($handle);

$ftype[]       =$_FILES['fileatt']['type'][$i];
$fname[]       =$_FILES['fileatt']['name'][$i];
}
}

/***************************************************************
 Creating Email: Headers, BODY
 1- HTML Email WIthout Attachment!! <<-------- H T M L ---------
 ***************************************************************/

if($attach!='yes') {
#---->Headers Part

$Headers =<<<AKAM
From: $From
To: $To
Reply-To: $FromEmail
Date: $Date
MIME-Version: 1.0
Content-Type: multipart/alternative;
   boundary="$boundary1"
AKAM;

#---->BODY Part
$Body        =<<<AKAM
MIME-Version: 1.0
Content-Type: multipart/alternative;
    boundary="$boundary1"

This is a multi-part message in MIME format.

--$boundary1
Content-Type: text/plain;
    charset="windows-1251"
Content-Transfer-Encoding: quoted-printable

Фамилия: $last_name1 <br/>\n
Имя: $FromName <br/>\n
Отчество: $father_name1 <br/>\n
Компания: $company1 <br/>\n
Должность: $oc1 <br/>\n
Почта: $FromEmail<br/>\n
Телефон: $phone_number1 <br/>\n\n
Выбранные вендоры: $vendors <br/>\n\n


--$boundary1
Content-Type: text/html;
    charset="windows-1251"
Content-Transfer-Encoding: quoted-printable

Фамилия: $last_name1 <br/>\n
Имя: $FromName <br/>\n
Отчество: $father_name1 <br/>\n
Компания: $company1 <br/>\n
Должность: $oc1 <br/>\n
Почта: $FromEmail<br/>\n
Телефон: $phone_number1 <br/>\n\n
Выбранные вендоры: $vendors <br/>\n\n



--$boundary1--
AKAM;

}
/***************************************************************
 2- HTML Email WIth Multiple Attachment <<----- Attachment ------
 ***************************************************************/
 
if($attach=='yes') {

$attachments='';
$Headers     =<<<AKAM
From: $From
To: $To
Reply-To: $FromEmail
Date: $Date
MIME-Version: 1.0
Content-Type: multipart/mixed;
    boundary="$boundary1"
AKAM;

for($j=0;$j<count($ftype); $j++){
$attachments.=<<<ATTA
--$boundary1
Content-Type: $ftype[$j];
    name="$fname[$j]"
Content-Transfer-Encoding: base64
Content-Disposition: attachment;
    filename="$fname[$j]"

$attachment[$j]

ATTA;
}

$Body        =<<<AKAM

This is a multi-part message in MIME format.

--$boundary1
Content-Type: multipart/alternative;
    boundary="$boundary2"

--$boundary2
Content-Type: text/plain;
    charset="windows-1251"
Content-Transfer-Encoding: quoted-printable

Фамилия: $last_name1 <br/>\n
Имя: $FromName <br/>\n
Отчество: $father_name1 <br/>\n
Компания: $company1 <br/>\n
Должность: $oc1 <br/>\n
Почта: $FromEmail<br/>\n
Телефон: $phone_number1 <br/><br/>\n\n
Выбранные вендоры: $vendors <br/>\n\n


--$boundary2
Content-Type: text/html;
    charset="windows-1251"
Content-Transfer-Encoding: quoted-printable


Фамилия: $last_name1 <br/>\n
Имя: $FromName <br/>\n
Отчество: $father_name1 <br/>\n
Компания: $company1 <br/>\n
Должность: $oc1 <br/>\n
Почта: $FromEmail<br/>\n
Телефон: $phone_number1 <br/><br/>\n\n
Выбранные вендоры: $vendors <br/>\n\n


--$boundary2--

$attachments
--$boundary1--
AKAM;
}

/***************************************************************
 Sending Email
 ***************************************************************/
  require_once "smtpauth.php";
  MailSmtp ($To, $Subject, $Body, $Headers);
//  MailSmtp ($To2, $Subject, $Body, $Headers);
// mail($To, $Subject, $Body, $Headers);
header("Location: ok.html"); 
die();
///////////////////////////////////////////

?>
