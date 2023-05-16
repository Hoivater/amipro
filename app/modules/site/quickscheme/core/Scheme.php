<?php
namespace limb\app\modules\site\quickscheme\core;
use limb\app\base\control as Control;
	/**
	 *
	 */
	class Scheme
	{
		public $count_prub;//количество прибавок/убавок удущих друг за дргуом
		public $name_s;//сбн или ссн
		public $name_scheme;//название таблицы
		public $string_number;//строка через запятую для схемы
		public $text_scheme;

		function __construct($count_prub, $name_s, $name_scheme, $string_number)
		{
			$this -> count_prub = $count_prub;
			$this -> name_s = mb_strtolower($name_s);
			$this -> name_scheme = $name_scheme;
			$this -> string_number = $string_number;
		}

		public function BuildScheme()
		{
			$number = htmlspecialchars($this -> string_number);
			$n_a = explode(",", $number);
			$sbn_text = htmlspecialchars($this -> name_s);
			$countPrUb = htmlspecialchars($this -> count_prub);
			$result_ar = array();

			for($i = 0; $i <= count($n_a)-2; $i++)
			{

				$prev = str_replace(" ", "", $n_a[$i]);
				$current = str_replace(" ", "", $n_a[$i+1]);
				if(is_numeric($prev) && is_numeric($current))
				{
					if($prev < $current)
					{
						include(__DIR__."/pribavki.php");
					}
					elseif ($prev > $current) {

						include(__DIR__."/ubavki.php");
					}
					else
					{
						$result = "Для того чтобы из ".$prev." петель получить ".$current." петель, достаточно сделать ".$current." обычных столбиков";
					}
					$result_ar[] = $result;
					//echo $result."<br />";
				}
				else
				{
					$result = "Не числа, сделайте числа";
				}
			}
			
			$generetic = "";
			$res = "1ряд) ... [ ".$n_a[0]." ] \n";
			for($i = 0; $i<= count($result_ar)-1; $i++){
				$res .= ($i+2)."ряд) ".$result_ar[$i]."\n";
			}
			$this -> text_scheme = $res;
 			return $this -> text_scheme;
		}



		public function OstPrib($ostPrev, $ostCurrent, $sbn_text, $num, $prev, $current, $generetic, $nsbn, $countPr)
		{
			if($ostPrev == $ostCurrent)
			{
				if($num % $ostCurrent == 0 && $num != $ostCurrent && $ostCurrent != 1)
				{
					//echo "Num = ".$num." ostcurrent = ".$ostCurrent;

					$res = $this -> idealSimmetry($prev, $current, $generetic, $ostPrev, $num, $nsbn, $countPr, $ostPrev, $sbn_text);
					$type = "mno";

				}
				else
					{
						$res = $ostPrev.$sbn_text;
						$type = "stat";
				}
				#$res = $ostPrev.$sbn_text;

				return array($res, $type);
				//return $ostPrev.$sbn_text;
			}
			elseif($ostPrev < $ostCurrent)
			{
				if($ostPrev * 2 <= $ostCurrent)
				{
					$countPr = ($ostPrev * 2)."пр ";
					$sbn = $ostCurrent - $ostPrev;
					if($sbn != 0)
					{
						return array(" ".$countPr.$sbn.$sbn_text." ", "stat");
					}
					else
						return array(" ".$countPr.$sbn, "stat");
				}
				else
				{
					$countPr = $ostCurrent - $ostPrev;//количество прибавок
					$countSbn = $ostPrev - $countPr;//количестов сбн
					$result = $countSbn.$sbn_text." ".$countPr."пр ";


					return array($result, "stat");
				}
			}
			return "";
		}
		#вызываем функцию только тогда когда $num кратно dop которое только сбн
		public function idealSimmetry($prev, $current, $generetic, $dop, $num, $sbn, $pr, $dopsbn, $sbn_text)
		{

				$tpl = file_get_contents(__DIR__."/../RU/commandline.tpl");

				$formula = file_get_contents(__DIR__."/../RU/formula.tpl");

				$template_main = array("%prev%", "%formula%", "%current%", "%generetic%");

				$template = array("%sbn%", "%ub%", "%count%", "%dop%");

				//$prev = //фактическое количество в предыдущем ряду
				//$current = //фактическое количество в текущем ряду
				//$generetic = //имя сгенерированное
				//$num - последнее количество повторений
				//$sbn - сбн, которые внутри скобок
				//$pr - количество прибавок заданных пользоваталем

				$count = $num / $dopsbn;//количство x COUNTраз
				$dop = $dop/$dop;//сбн которое осталось свободно
				$replace = array($sbn.$sbn_text." ", $pr."пр ", $count, $dop.$sbn_text." ");
				$formulas = str_replace($template, $replace, $formula);//повторяющаяся часть формулы, будет уточнена в цикле

				#количество повторений - 	$dopsbn - которые нам необходимо равномерно разбросать по строке
				$formulas = str_repeat($formulas, $dopsbn);
				$replace_main = array($prev, $formulas, $current, $generetic);
				$res = str_replace($template_main, $replace_main, $tpl);

				return $res;
		}

	}

#функция обрабатывает остаток возвращает доп из них созданных

?>