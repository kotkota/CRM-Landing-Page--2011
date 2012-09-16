<?php header ("Cache-Control: no-cache? must-revalidate");
header ("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="ru">
 <head>
 	 <meta charset="windows-1251">
  <meta http-equiv="content-type" content="text/html; charset=windows-1251">
  <title>Бесплатная демонстрация CRM-систем</title>
  <!--[if lt IE 9]> 
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> 
  <![endif]-->
  
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="check.js"></script>
  <script type="text/javascript" src="multivalue.js"></script>
  
 </head>
<?php

if (!empty ($_POST)){
// Обработчик
include "zform.php";

exit();
}
?>
 <body>
 	<header class="header">
 	<div class="container">
 		<img src="images/bs_logo.png" alt="Berner & Stafford" />
 		<div class="sidebar phone">+7 (495) 927-01-48</div>
 	</div>
</header>
	<div class="container image">
		<div>
			<h1>БЕСПЛАТНАЯ<br/>демонстрация CRM-систем* для&nbsp;УВЕЛИЧЕНИЯ ДОХОДА вашей компании</h1>
			<p>* CRM, CRM-система (сокращение от англ. Customer<br/>Relationship Management) &mdash; Система управления<br/>взаимоотношениями с&nbsp;клиентами.
			<a href="http://ru.wikipedia.org/wiki/CRM-система" target="_blank">Подробнее&hellip;</a>
			</p>
		</div>
	</div>
	<div class="container">
		<img src="images/logotypes.jpg" alt="" />
	</div>
	<div class="space"></div>
 	<div class="container">
 	<div class="main">
 		<div class="question">
 			<div class="content">
 				<h2>Зачем нужна CRM-система?</h2>
 			</div>
 		</div>
 		<div class="answer">
 			<div class="content">
 				<p>Это очень выгодная инвестиция, ведь работа с клиентами &mdash; единственный источник дохода. CRM выводит отношения с&nbsp;клиентами на новый уровень и&nbsp;резко увеличивает объем продаж. На&nbsp;презентации вы узнаете, что ваша компания может получить от&nbsp;CRM.</p>
 			</div>
 		</div>
 		<div class="tail"></div>
 		
 		<div class="question">
 			<div class="content">
 				<h2>Какую программу выбрать?</h2>
 			</div>
 		</div>
 		<div class="answer">
 			<div class="content">
 				<p>Выяснив специфику вашего бизнеса, специалисты определят, какая система в&nbsp;какой комплектации вам подходит, и покажут ее в&nbsp;работе.</p>
 			</div>
 		</div>
 		<div class="tail"></div>
 		
 		<div class="question">
 			<div class="content">
 				<h2>У нас был печальный опыт неудачного<br/>внедрения.</h2>
 			</div>
 		</div>
 		<div class="answer">
 			<div class="content">
 				<p>На презентации специалисты объяснят, что делалось неправильно, разберут типовые ошибки, расскажут, как ведется грамотное внедрение.</p>
 			</div>
 		</div>
 		<div class="tail"></div>
 		
 		<div class="question">
 			<div class="content">
 				<h2>Не представляю, что мне нужно от CRM-системы и&nbsp;на что ориентироваться при&nbsp;выборе?</h2>
 			</div>
 		</div>
 		<div class="answer">
 			<div class="content">
 				<p>Не беда! Отметьте в заявке соответствующий пункт, мы свяжемся с вами и поможем сориентироваться, подобрать вариант, отвечающий вашим потребностям и возможностям.</p>
 			</div>
 		</div>
 		<div class="tail"></div>
 		
	</div>
	<div class="sidebar">
		<div class="baloon_small">
			<div class="content">
				<h3>Отправьте анкету-заявку!</h3>
				<p>Укажите, презентацию какой CRM-системы вы хотели бы видеть в первую очередь. Вас интересует несколько систем? Отметьте каждую!</p>
			</div>
			<div class="tail"></div>
		</div>
		<div class="space"></div>
		<div class="baloon_form">
			<form class="content" name="myform2" method="post" ENCTYPE="multipart/form-data" onsubmit="return SendForm();">

			<p class="f_line_text">Фамилия<span class="red">*</span></p>
			<div class="form_line"><input type="text" name="last_name" id="last_name1" class="f_line"></div>
			<div class="col1">
				<p class="f_line_text">Имя<span class="red">*</span></p>
				<div class="form_line"><input type="text" name="name" id="name1" class="f_line"></div>
			</div>
			<div class="col2">
				<p class="f_line_text">Отчество</p>
				<div class="form_line"><input type="text" name="father_name" id="father_name1" class="f_line"></div>
			</div>
			<p class="f_line_text">Компания<span class="red">*</span></p>
			<div class="form_line"><input type="text" name="company" id="company1" class="f_line"></div>
			<p class="f_line_text">Сайт</p>
			<div class="form_line"><input type="text" name="website" id="website1" class="f_line"></div>
			
			<p class="f_line_text">Должность<span class="red">*</span></p>
			<div class="form_line"><input type="text" name="oc" id="oc1" class="f_line"></div>
			<p class="f_line_text">e-mail<span class="red">*</span></p>
			<div class="form_line"><input type="text" name="email" id="email1" class="f_line"></div>
			<p class="f_line_text">Контактный телефон<span class="red">*</span></p>
			<div class="form_line"><input type="text" name="phone_number" id="phone_number1" class="f_line"></div>
			<p class="f_line_text">Интересующий вендор:</p>
			
			<div class="col1">
				<input type="checkbox" name="vendor1" id="cb1">
				<label for="cb1">Terrasoft</label><br/>
				<input type="checkbox" name="vendor2" id="cb2">
				<label for="cb2">1C: CRM</label><br/>
				<input type="checkbox" name="vendor3" id="cb3">
				<label for="cb3">Qsoft CRM</label><br/>
			</div>
			<div class="col2">
				<input type="checkbox" name="vendor4" id="cb4">
				<label for="cb4">SalesForce</label><br/>
				<input type="checkbox" name="vendor5" id="cb5">
				<label for="cb5">Мегаплан</label><br/>
				<input type="checkbox" name="vendor6" id="cb6">
				<label for="cb6">РосБизнесСофт</label><br/>
			</div>
			<input type="checkbox" name="vendor7" id="cb7">
			<label for="cb7">Microsoft Dynamics CRM</label><br/>
			<input type="checkbox" name="vendor8" id="cb8">
			<label for="cb8">Нужна консультация</label>
			
			<input type="image" src="images/button.png" id="go_image" alt="button">
			</form>
			<div class="tail"></div>
		</div>
	</div>
	<div class="space"></div>
	</div>
	<footer class="footer">
		<div class="container">
		<img src="images/logo_footer.png" alt="" width="70" height="25" />
		<p>&copy; 2009-2011 &laquo;Berner&amp;Stafford&raquo; <br />
		Адрес: 127083, г. Москва, ул. 8 Марта, д.10 стр.1.<br />
		E-mail: <a href="mailto:info@bernerandstafford.ru">info@bernerandstafford.ru</a></p>
		<div class="sidebar "><p><br/><br/>Дизайн: <a href="mailto:shushakov@gmail.com">kotkota studio</a></p></div>
		</div>
	</footer>
	<script type="text/javascript">
	
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-10560192-2']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	
	</script>
	
 </body>
 </html>