<?php 

$to      = "shushakov@gmail.com";
// $to      = "my@bernerandstafford.ru"; // �����1 ���� ���� ������
// $to2      = "ak@bernerandstafford.ru"; // �����2 ���� ���� ������
$subject = "Lead Generation - ������ �� �����������."; // ���� ������ - ���������


$last_name = $_POST['last_name'];
$name    = $_POST['name'];
$father_name = $_POST['father_name'];
$company = $_POST['company'];
$oc    = $_POST['oc'];
$phone_number = $_POST['phone_number'];
$email   = $_POST['email'];
$subject = "=?windows-1251?b?" . base64_encode($subject) . "?=";
$Date = date(DATE_RFC822);


/// �������� ������������ ����� E-MAIL

if (!preg_match("/[0-9a-z_]+@[0-9a-z_\-^\.]+\.[a-z]{2,6}$/i",$email)){
echo '<center><h1>����������� ������ ����� �� �����, ��� �� ������ !!</h1><br><b>�� �����:</b><i>';
$email=trim($email); //���� �������
$email=htmlspecialchars($email); //������� ���� html
echo "$email</i>";
echo "<br><a href=# onClick='history.back()'>�����</a></center>";
exit();
}
// �������� ������������ ����� E-MAIL



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
  $vendors .= "�������� <br/>\n";
if(!empty($_POST['vendor6']) )
  $vendors .= "������������� <br/>\n";
if(!empty($_POST['vendor7']) )
  $vendors .= "Microsoft Dynamics CRM <br/>\n";
if(!empty($_POST['vendor8']) )
  $vendors .= "����� ������������ <br/>\n";

if($vendors=='')
	$vendors='������� �� �������';




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

�������: $last_name1 <br/>\n
���: $FromName <br/>\n
��������: $father_name1 <br/>\n
��������: $company1 <br/>\n
���������: $oc1 <br/>\n
�����: $FromEmail<br/>\n
�������: $phone_number1 <br/>\n\n
��������� �������: $vendors <br/>\n\n


--$boundary1
Content-Type: text/html;
    charset="windows-1251"
Content-Transfer-Encoding: quoted-printable

�������: $last_name1 <br/>\n
���: $FromName <br/>\n
��������: $father_name1 <br/>\n
��������: $company1 <br/>\n
���������: $oc1 <br/>\n
�����: $FromEmail<br/>\n
�������: $phone_number1 <br/>\n\n
��������� �������: $vendors <br/>\n\n



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

�������: $last_name1 <br/>\n
���: $FromName <br/>\n
��������: $father_name1 <br/>\n
��������: $company1 <br/>\n
���������: $oc1 <br/>\n
�����: $FromEmail<br/>\n
�������: $phone_number1 <br/><br/>\n\n
��������� �������: $vendors <br/>\n\n


--$boundary2
Content-Type: text/html;
    charset="windows-1251"
Content-Transfer-Encoding: quoted-printable


�������: $last_name1 <br/>\n
���: $FromName <br/>\n
��������: $father_name1 <br/>\n
��������: $company1 <br/>\n
���������: $oc1 <br/>\n
�����: $FromEmail<br/>\n
�������: $phone_number1 <br/><br/>\n\n
��������� �������: $vendors <br/>\n\n


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
