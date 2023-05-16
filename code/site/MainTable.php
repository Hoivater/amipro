<?
namespace limb\code\site;
use limb\app\base as Base; #для работы с базой данный
use limb\app\worker as Worker;

	/**
	 * работа с данными таблицы
	 *
	 */
	class MainTable
	{

		public function __construct()
		{
			
			if(isset($_COOKIE['language'])) $this -> language = $_COOKIE['language'];
			else 
			{
				$this -> language = "ru_";
			}
		}

		//метод достаюший все поля из таблицы
		public function searchFieldCom()
		{
			#$si = new Base\SearchInq($name);
			#$result = $si -> select() ->  where($key, $value, $operator) -> limit() -> res();

			#code...

		}
		#метод добавляющий данные в таблицу, value - строка следующего вида
		#NULL, '".$this -> title."', '".$this -> keywords."', '".$this -> description."'
		public function insertFieldCom($value)
		{
			#$ri = new Base\RedactionInq($this -> name, $this -> table_key);
			#$result = $ri -> insert($value);

			#code...
		}
		protected function Limb($auth = "")#сборщик страницы
		{
			$limb = new Worker\Limb();
			$page_ini = parse_ini_file(__DIR__."/../../view/".$this -> language."page.ini");
			$verif_id = Base\control\Control::VerifIdUser();

			$si = new Base\SearchInq("jilert32dwd_scheme");
			$si -> selectQ();
			$si -> whereQ("user_id", $verif_id, "=");
			$si -> orderDescQ();
			$si -> resQ();  //массив со всеми записями
			$result = $si -> paginateQ(5);
			$resultn = $result[0];
			$module_paginate = $result[1];

			if(isset($resultn[0]["id"])){
				$nick_name = Base\control\Control::NameUser();
				$day = Base\control\Necessary::ConvertDate(time());
				$resultn = $this -> Decoder($resultn);
				$template = [
					"norepeat" => ["%title%", "%nick_name%"],
					"internal" => [
									["name" => "content", "folder" => "main"]
								],
					"repeat_tm" => ["scheme"]
				];
				$data = [
					"norepeat" => ["title" => $nick_name, "nick_name" => $nick_name],
					"internal" => [[["module_paginate" => $module_paginate]]],
					"repeat_tm" => [$resultn]
				];

			}
			else
			{


				$nick_name = Base\control\Control::NameUser();
				$template = [
					"norepeat" => ["%title%", "%nick_name%"],
					"internal" => [
									["name" => "content", "folder" => "main/re"],
									["name" => "menu_top", "folder" => "main"]
								],
				];

				$data = [
					"norepeat" => ["title" => "Новые задачи", "nick_name" => $nick_name],
					"internal" => [[[]], [['new_process' => 'active', "%yesterday%" => '', "%today%" => '', "%tomorrow%" => '']]],
					"repeat_tm" => []
				];
			}


				$render = $limb -> TemplateMaster($template, $data, $auth, $this -> html);

				return $render;
		}
		protected function Decoder($data)
		{
			$st = new SchemeTable();

			for ($i=0; $i <= count($data)-1 ; $i++) {
				$data[$i]["date"] = Base\control\Necessary::ConvertDate($data[$i]["date_creation"]);
				$data[$i]["little_scheme"] = $st -> LittleScheme($data[$i]["scheme"]);
			}

			return $data;
		}
	}
?>
