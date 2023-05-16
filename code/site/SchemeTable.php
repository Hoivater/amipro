<?
	namespace limb\code\site;
	use limb\app\base as Base;#для работы с валидатором и бд
	use limb\app\base\control as Control;
	use limb\app\worker as Worker;#для шаблонизатора
	use limb\app\modules\site\options as Options;#для транслита схем
	#use limb\app\form as Form;
	#use limb\app\modules\commentary as Comm;
	/**
	 * работа с данными таблицы
	 *
	 */
	class SchemeTable
	{
		public $tmpltScheme = ['%id%', '%user_id%', '%name%', '%link%', '%scheme%', '%setting_a%', '%setting_b%', '%setting_c%', '%setting_d%', '%setting_e%', '%setting_f%', '%setting_g%', '%setting_h%', '%setting_o%', '%setting_t%', '%date_creation%'];//массив из таблиц
		public $resultScheme;//финишная сборка для шаблона для возврата в _Page
		public $name = 'jilert32dwd_scheme';//имя таблицы которое используется по умолчанию
		public $table_key = "`id`, `user_id`, `name`, `link`, `scheme`, `setting_a`, `setting_b`, `setting_c`, `setting_d`, `setting_e`, `setting_f`, `setting_g`, `setting_h`, `setting_o`, `setting_t`, `date_creation`";
		protected $language;
		#public $replace = [$id, $user_id, $name, $link, $scheme, $setting_a, $setting_b, $setting_c, $setting_d, $setting_e, $setting_f, $setting_g, $setting_h, $setting_o, $setting_t, $date_creation];


		public function __construct()
		{
			if(isset($_COOKIE['language'])) $this -> language = $_COOKIE['language'];
			else 
			{
				$this -> language = "ru_";
			}
			#code...
		}

		//метод достаюший все поля из таблицы
		public function searchFieldCom()
		{
			#$si = new Base\SearchInq($name);
			#$si -> selectQ(); 
			#$si ->  whereQ($key, $value, $operator);
			#$si -> limitQ();
			#$result = $si -> resQ();

			#code...

		}
		#метод добавляющий данные в таблицу, value - строка следующего вида
		#NULL, '".$this -> title."', '".$this -> keywords."', '".$this -> description."'
		#функция для автозаполнения созданной таблицы, можно корретировать функции, например выбрать fotogenerate /в будущем =)
		public static function insertFieldLimb($num)
		{
			$name77656756 = 'jilert32dwd_scheme';
			$table_key757658 = "`id`, `user_id`, `name`, `link`, `scheme`, `setting_a`, `setting_b`, `setting_c`, `setting_d`, `setting_e`, `setting_f`, `setting_g`, `setting_h`, `setting_o`, `setting_t`, `date_creation`";
			for($i = 0; $i <= $num-1; $i++)
			{
			$id = Control\Generate::this_idgenerate();
			$user_id = Control\Generate::intgenerate(33);
			$name = Control\Generate::textgenerate();
			$link = Control\Generate::varchargenerate(250);
			$scheme = Control\Generate::textgenerate();
			$setting_a = Control\Generate::varchargenerate(250);
			$setting_b = Control\Generate::varchargenerate(250);
			$setting_c = Control\Generate::varchargenerate(250);
			$setting_d = Control\Generate::varchargenerate(250);
			$setting_e = Control\Generate::varchargenerate(250);
			$setting_f = Control\Generate::varchargenerate(250);
			$setting_g = Control\Generate::varchargenerate(250);
			$setting_h = Control\Generate::varchargenerate(250);
			$setting_o = Control\Generate::varchargenerate(250);
			$setting_t = Control\Generate::varchargenerate(250);
			$date_creation = Control\Generate::this_dategenerate();
			$value = "'".$id."', '".$user_id."', '".$name."', '".$link."', '".$scheme."', '".$setting_a."', '".$setting_b."', '".$setting_c."', '".$setting_d."', '".$setting_e."', '".$setting_f."', '".$setting_g."', '".$setting_h."', '".$setting_o."', '".$setting_t."', '".$date_creation."'";
			$ri = new Base\RedactionInq($name77656756, $table_key757658);
			$result = $ri -> insert($value);
			}
			#code...
		}


		protected function Limb($link, $auth = "noauth")#сборщик страницы
		{
			$limb = new Worker\Limb();

			$si = new Base\SearchInq($this -> name);
			$si -> selectQ();
			$si -> whereQ("link", $link, "=");
			$si -> orderDescQ();
			$result = $si -> resQ();  //массив со всеми записями
			$resultn = $this -> Decoder($result);
			$foto_array = self::FotoArray($resultn[0]["setting_b"]);
			if(isset($result[0]["id"])){

				$template = [
								"norepeat" => ["%title%", "%name%"],
								"internal" => [
							                ["name" => "content", "folder" => "scheme"]
							         ],
								"repeat_tm" => ["fotoone"]
							];
					$data = [
							        "norepeat" => ["title" => "Главная страница", "name" => "Перечень"],
							        "internal" => [$resultn],
							        "repeat_tm" => [$foto_array]
							];


				$render = $limb -> TemplateMaster($template, $data, $auth, $this -> html);
			}
			else
			{
				header("Location:/");
				exit();
			}
			return $render;
		}
		public static function FotoArray($str)
		{
			if($str !== "")
			{
				$result = [];
				$arr_str = explode("&", $str);
				for($i = 0; $i <= count($arr_str)-1; $i++)
				{
					$result[$i]["name_image"] = $arr_str[$i];
				}
			}
			else
			{
				$result = [[]];
			}
			return $result;
		}
		public static function NewFile($data)
		{
			$name77656756 = 'jilert32dwd_scheme';
			$table_key757658 = "`id`, `user_id`, `name`, `link`, `scheme`, `setting_a`, `setting_b`, `setting_c`, `setting_d`, `setting_e`, `setting_f`, `setting_g`, `setting_h`, `setting_o`, `setting_t`, `date_creation`";
		

			$si = new Base\SearchInq($name77656756);
			$si -> selectQ();
			$si -> whereQ("link", $data["link"], "=");
			$si -> orderDescQ();
			$result = $si -> resQ();  //массив со всеми записями
			if(isset($result[0]["id"]))
			{
				$images = $result[0]["setting_b"];
			}

			if($images != "")
			{
				$n_images = $images."&".$data["file1"];
			}
			else
				$n_images = $data["file1"];
			
			$ri = new Base\RedactionInq($name77656756, $table_key757658);
			$result = $ri -> update("setting_b", $n_images, "link", $data["link"]);
		}
		public function LittleScheme($scheme){
			$vs = new Options\ViewScheme();
			$viewShemeOne = $vs -> retranslyationSchema($scheme);
			return $viewShemeOne;
		}
		public function Decoder($data)
		{
			for ($i=0; $i <= count($data)-1 ; $i++) {
				$data[$i]["date"] = Base\control\Necessary::ConvertDate($data[$i]["date_creation"]);
				$data[$i]["scheme"] = $this -> LittleScheme($data[$i]["scheme"]);
			}

			return $data;
		}
	}
?>
