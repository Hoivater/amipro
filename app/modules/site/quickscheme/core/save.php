<?php
	require "../../../heart/Search.php";
	if(isset($_POST["saveShema"]) == "yes")
	{
		$text = htmlspecialchars($_POST["textTextarea"]);
		if(str_replace(" ", "", $text) == "")
		{
			echo "<p style = 'color:red'><span class= 'fa fa-warning'></span> Сохранение пустой области невозможно =(</p>";
		}
		else
		{
			session_start();
			$search = new Search();
			$id_char = htmlspecialchars($_POST["id_char"]);
			$id_user = $_SESSION["id_email"];
			$key_string = "`id`, `id_char`, `author`, `text`, `visible`, `date`";
			$value_string = "NULL, '".$id_char."', '".$id_user."', '".$text."', '1', '".time()."'";;
			$table = "shema_hu34985423";
			
			$key = "id_char";
			//ищем уже похожее и пересохраняем если такое 
			$data = $search -> ChoiceTableString($table, $id_char, $key);
			if(isset($data[0]["id"]))
			{
				$search -> UpdateStr($table, "text", $text, "id_char", $id_char);
			}
			else{
				$search -> InsertString($table, $key_string, $value_string);
			}
			$ini = parse_ini_file("../../../heart/system.ini");
			echo "<p><span class= 'fa fa-comment-o'></span> Сохранено, доступно по ссылке <a target = '_black' href = '".$ini["name_site"]."/schema/'>Тут</a></p>";
		}
	}
?>