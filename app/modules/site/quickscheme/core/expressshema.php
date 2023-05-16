<?php
		session_start();

		/*ПРОВЕРКА НА ПОДПИСКУ И ДОСТУП*/


		/*-----------------------------*/
		//$data[0]["script.template"] - HTML текст скрипта выводимый
	 	if(isset($_SESSION["redaction_shema"]))
	 	{
	 		$idproduct = $_SESSION["redaction_shema"];
	 		$t = $this -> search -> ChoiceTableString("shema_hu34985423", $idproduct, "id_char");
	 		$value = $t[0]["text"];
	 		unset($_SESSION["redaction_shema"]);
	 	}
	 	else {
	 		 		$value = "";
	 		 		$idproduct = $this -> IdProduct;
	 		 	}
	 	$js = ' <script type="text/javascript" src="'.$this -> ini['name_site'].'/core/script/'.$this -> name.'/js/'.$this -> name.'.js"></script>';
	 	$css = '<link rel="stylesheet" href="'.$this -> ini['name_site'].'/core/script/'.$this -> name.'/css/'.$this -> name.'.css">';
		$tr = file_get_contents("core/script/".$this -> name."/".$this -> lang."/page.tpl");
		$tr = str_replace(array("%generate_cod%", "%value%"), array($idproduct, $value), $tr);
		$html_s = $css.$tr.$js;
		
		$data[0]["script.template"] = $html_s;
		
?>