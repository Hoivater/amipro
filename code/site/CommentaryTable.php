<?
	namespace limb\code\site;
	use limb\app\base as Base;#для работы с валидатором и бд
	use limb\app\base\control as Control;
	use limb\app\worker as Worker;#для шаблонизатора
	#use limb\app\form as Form;
	#use limb\app\modules\commentary as Comm;
	/**
	 * работа с данными таблицы
	 *
	 */
	class CommentaryTable
	{
		public $tmpltCommentary = ['%id%', '%id_article%', '%name%', '%text%', '%levels%', '%nesting%', '%code%', '%date_creation%'];//массив из таблиц
		public $resultCommentary;//финишная сборка для шаблона для возврата в _Page
		public $name = 'jilert32dwd_commentary';//имя таблицы которое используется по умолчанию
		public $table_key = "`id`, `id_article`, `name`, `text`, `levels`, `nesting`, `code`, `date_creation`";
		protected $language;
		#public $replace = [$id, $id_article, $name, $text, $levels, $nesting, $code, $date_creation];


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
			$name77656756 = 'jilert32dwd_commentary';
			$table_key757658 = "`id`, `id_article`, `name`, `text`, `levels`, `nesting`, `code`, `date_creation`";
			for($i = 0; $i <= $num-1; $i++)
			{
			$id = Control\Generate::this_idgenerate();
			$id_article = Control\Generate::intgenerate(11);
			$name = Control\Generate::varchargenerate(100);
			$text = Control\Generate::textgenerate();
			$levels = Control\Generate::textgenerate();
			$nesting = Control\Generate::intgenerate(11);
			$code = Control\Generate::textgenerate();
			$date_creation = Control\Generate::this_dategenerate();
			$value = "'".$id."', '".$id_article."', '".$name."', '".$text."', '".$levels."', '".$nesting."', '".$code."', '".$date_creation."'";
			$ri = new Base\RedactionInq($name77656756, $table_key757658);
			$result = $ri -> insert($value);
			}
			#code...
		}


		protected function Limb($auth = "noauth")#сборщик страницы
		{
			$limb = new Worker\Limb();

			$si = new Base\SearchInq($this -> name);
			$si -> selectQ();
			$si -> whereQ("link", $link, "=");
			$si -> orderDescQ();
			$result = $si -> resQ();  //массив со всеми записями
			if(isset($result[0]["id"])){

				$template = [
								"norepeat" => ["% title%", "% name%"],
								"repeat" => ["menu"],
								"internal" => [
							                ["name" => "content", "folder" => "footer"], 
							                ["name" => "art", "folder" => "footer"], 
							                ["name" => "dies", "folder" => "footer"]
							         ],
								"repeat_tm" => ["frs"]
							];
					$data = [
							        "norepeat" => ["title" => "Главная страница", "name" => "Перечень"],
							        "internal" => [$content, $art, $dies],
							        "repeat_tm" => [$frs]
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
	}
?>
