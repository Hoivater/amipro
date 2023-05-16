<?
	namespace limb\app\modules\site\options;

class ViewScheme
	{
		private $HTMLtext;
		private $tegsArray = array();
		private $tegsArrayNow = array();
		private $regularImg;
		private $regularSchema;

		function __construct()
		{
			$this -> tegsArray = array("[h]", "[/h]","[h2]", "[/h2]", "[hr]", "[p]", "[/p]", "[p center]", "[i]", "[/i]", "[b]", "[u]", "[/b]", "[/u]",
				"[color aqua]",
				 "[color blue]",
				 "[color fuchsia]",
				 "[color gray]",
				 "[color green]",

				 "[color lime]",
				 "[color maroon]",
				 "[color navy]",
				 "[color olive]",
				 "[color purple]",

				 "[color red]",
				 "[color silver]",
				 "[color teal]",
				 "[color white]",
				 "[color yellow]",  "[/a]");
			$this -> tegsArrayNow = array("<h3>", "</h3>","<h2>", "</h2>", "<hr>", "<p style='text-indent:20px'>", "</p>", "<p class = 'text-center'>", "<i>", "</i>", "<b>", "<u>", "</b>", "</u>",
			 "<style>.mainnotes{color:aqua;}</style>",
			 "<style>.mainnotes{color:blue;}</style>",
			 "<style>.mainnotes{color:fuchsia;}</style>",
			 "<style>.mainnotes{color:gray;}</style>",
			 "<style>.mainnotes{color:green;}</style>",

			 "<style>.mainnotes{color:lime;}</style>",
			 "<style>.mainnotes{color:maroon;}</style>",
			 "<style>.mainnotes{color:navy;}</style>",
			 "<style>.mainnotes{color:olive;}</style>",
			 "<style>.mainnotes{color:purple;}</style>",

			 "<style>.mainnotes{color:red;}</style>",
			 "<style>.mainnotes{color:silver;}</style>",
			 "<style>.mainnotes{color:teal;}</style>",
			 "<style>.mainnotes{color:white;}</style>",
			 "<style>.mainnotes{color:yellow;}</style>",  "</a>");
		}
	public function TranslateShema($text)
	{
		$string_array = explode("\n", $text);
		$string_aa = array();
		$result = "[nsh Scheme autoTranslation nsh]\n";
		for($i = 0; $i <= count($string_array)-1; $i++)
		{
			$string_aa[] = explode(" ", $string_array[$i]);
		}
		for($i = 0; $i <= count($string_aa)-1; $i++)
		{
			for($j = 0; $j <= count($string_aa[$i])-1; $j++)
			{
				$result = $result." ".$this -> TranslateSymbol($string_aa[$i][$j]);
			}
			$result = $result."\n";
		}
		return $result;
	}
	private function TranslateSymbol($str)
	{

		if(stripos($str, "пр") && is_numeric(str_replace("пр", "", $str)))
		{
			return str_replace("пр", "inc", $str);
		}
		elseif (stripos($str, "сбн") && is_numeric(str_replace("сбн", "", $str))) {
			return str_replace("сбн", "sc", $str);
		}
		elseif (stripos($str, "ссн") && is_numeric(str_replace("ссн", "", $str))) {
			return str_replace("ссн", "dc", $str);
		}
		elseif (stripos($str, "сс2н") && is_numeric(str_replace("сс2н", "", $str))) {
			return str_replace("сс2н", "tr", $str);
		}
		elseif (stripos($str, "сс3н") && is_numeric(str_replace("сс3н", "", $str))) {
			return str_replace("сс3н", "dtr", $str);
		}
		elseif (stripos($str, "вп") && is_numeric(str_replace("вп", "", $str))) {
			return str_replace("вп", "ch", $str);
		}
		elseif (stripos($str, "сс") && is_numeric(str_replace("сс", "", $str))) {
			return str_replace("сс", "SlSt", $str);
		}
		elseif (stripos($str, 'уб')  && is_numeric(str_replace("уб", "", $str))) {
			return str_replace("уб", "dec", $str);
		}
		elseif (stripos($str, "ряд)")  && is_numeric(str_replace("ряд)", "", $str))) {
			return str_replace("ряд", "rnd", $str);
		}

		elseif(stripos($str, "раз"))
		{
			return str_replace("раз", "rep", $str);
		}
		else
		{
			return $str;
		}
	}
	public function visibleCode($text)
	{

			$ar[0] = $text;
			$ar_type[0] = 0;
			$ar_lang[0] = 0;

		for($i = 0; $i <= count($ar)-1; $i++)
		{
			$string_ar[] = $this -> CodePage($ar[$i], $ar_type[$i], $ar_lang[$i]);
		}

			$result = $string_ar[0];

		return $result;
	}

		public function TrueText($text)
		{
			$this -> HTMLtext = str_replace($this -> tegsArray, $this -> tegsArrayNow, $text);


			/*ИЩЕМ ИЗОБРАЖЕНИЯ В ТЕКСТЕ И МЕНЯЕМ ИХ НА РЕАЛЬНЫЙ КОД*/
			$pattern_img = "/\[img (\w){36}\]/";
			preg_match_all($pattern_img, $this -> HTMLtext, $result);
			$array = $result[0];

			if(count($array) >= 1)
			{
				$newa = $this -> retranslyation($array);

				$this -> HTMLtext = str_replace($array, $newa, $this -> HTMLtext);
			}
			/*ИЩЕМ СХЕМЫ В ТЕКСТЕ И МЕНЯЕМ ИХ НА РЕАЛЬНЫЙ КОД*/
			$pattern_schema = "/\[schema (\w){36}\]/";
			preg_match_all($pattern_schema, $this -> HTMLtext, $resultS);

			$arrayS = $resultS[0];

			if(count($arrayS) >= 1)
			{

				$newaS = $this -> retranslyationSchema($arrayS);
				$this -> HTMLtext = str_replace($arrayS, $newaS, $this -> HTMLtext);
			}

			$pattern_ahref = "/\[ahref (.)*\]/U";

			preg_match_all($pattern_ahref, $this -> HTMLtext, $resultA);
			$arrayA = $resultA[0];

			if(count($arrayA) >= 1)
			{
				$newaA = $this -> retranslyationAhref($arrayA);
				$this -> HTMLtext = str_replace($arrayA, $newaA, $this -> HTMLtext);
			}
		}
	public function CodePage($str_code, $type, $lang){

		//type = 0, стандартная схема - темная, 1 - светлая
		$na = explode("\n", $str_code);
		for($i = 0; $i <= count($na)-1; $i++)
		{
			$na1[] = explode(" ", $na[$i]);//массив массива, в котором каждый элемент отдельно друг от друга
		}
		$nan = array();
		for($i = 0; $i <= count($na1)-1; $i++)
		{
			for ($j=0; $j <= count($na1[$i]) ; $j++) {
				if(isset($na1[$i][$j]))
					$nan[$i][$j] = $this -> visibleSymbol($na1[$i][$j], $type);
			}
		}
		$r_na = array();

		for($i = 0; $i <= count($nan)-1; $i++)
		{
			$r_na[$i] = implode(" ", $nan[$i]);
		}
		$r_nan = implode("\n", $r_na);

		//print_r($str_code);
		return $r_nan;
	}
	########################################################################################################
	private function visibleBreak()
	{

	}
	private function visibleSymbol($str, $type)
	{
		$str = str_replace(" ", "", $str);
		if($type == 0)
		{
			if(stripos($str, "пр") && is_numeric(str_replace("пр", "", $str)))
			{
				$result = "<span class='inc'>".$str."</span>";
			}
			elseif (stripos($str, "сбн") && is_numeric(str_replace("сбн", "", $str))) {
				$result = "<span class='sbn'>".$str."</span>";
			}
			elseif (stripos($str, "ссн") && is_numeric(str_replace("ссн", "", $str))) {
				$result = "<span class='ssn'>".$str."</span>";
			}
			elseif (stripos($str, "сс2н") && is_numeric(str_replace("сс2н", "", $str))) {
				$result = "<span class='ss2n'>".$str."</span>";
			}
			elseif (stripos($str, "сс3н") && is_numeric(str_replace("сс3н", "", $str))) {
				$result = "<span class='ss3n'>".$str."</span>";
			}
			elseif (stripos($str, "вп") && is_numeric(str_replace("вп", "", $str))) {
				$result = "<span class='vp'>".$str."</span>";
			}
			elseif (stripos($str, "сс") && is_numeric(str_replace("сс", "", $str))) {
				$result = "<span class='ss'>".$str."</span>";
			}
			elseif (stripos($str, 'уб')  && is_numeric(str_replace("уб", "", $str))) {
				$result = "<span class='reduce'>".$str."</span>";
			}
			elseif (stripos($str, "ряд)")  && is_numeric(str_replace("ряд)", "", $str))) {
				$result = "<span class='num_rowse'>".$str."</span>";
			}
			elseif ($str == "[" || $str == "]" || is_numeric($str)) {
				$result = "<span class='summa'>".$str."</span>";
			}
			elseif($str == "(" || $str == ")"   || stripos($str, "раз"))
			{
				$result = "<span class='break'>".$str."</span>";
			}
			/************************************************************/
			elseif(stripos($str, "inc") && is_numeric(str_replace("inc", "", $str)))
			{
				$result = "<span class='inc'>".$str."</span>";
			}
			elseif (stripos($str, "sc") && is_numeric(str_replace("sc", "", $str))) {
				$result = "<span class='sbn'>".$str."</span>";
			}
			elseif (stripos($str, "dc") && is_numeric(str_replace("dc", "", $str))) {
				$result = "<span class='ssn'>".$str."</span>";
			}
			elseif (stripos($str, "tr") && is_numeric(str_replace("tr", "", $str))) {
				$result = "<span class='ss2n'>".$str."</span>";
			}
			elseif (stripos($str, "dtr") && is_numeric(str_replace("dtr", "", $str))) {
				$result = "<span class='ss3n'>".$str."</span>";
			}
			elseif (stripos($str, "ch") && is_numeric(str_replace("ch", "", $str))) {
				$result = "<span class='vp'>".$str."</span>";
			}
			elseif (stripos($str, "SlSt") && is_numeric(str_replace("SlSt", "", $str))) {
				$result = "<span class='ss'>".$str."</span>";
			}
			elseif (stripos($str, 'dec')  && is_numeric(str_replace("dec", "", $str))) {
				$result = "<span class='reduce'>".$str."</span>";
			}
			elseif (stripos($str, "rnd)")  && is_numeric(str_replace("rnd)", "", $str))) {
				$result = "<span class='num_rowse'>".$str."</span>";
			}
			elseif(stripos($str, "rep"))
			{
				$result = "<span class='break'>".$str."</span>";
			}

			/************************************************************/
			elseif($str == "x")
			{
				$result = "<span class='xsymbol'>".$str."</span>";
			}
			elseif($str == "[nsh")
			{
				$result = "<span class = 'name_shema'><span class = 'fa fa-hashtag'></span> ";
			}
			elseif($str == "nsh]" || $str == "com]")
			{
				$result = "</span>";
			}
			elseif($str == "[com")
			{
				$result = "<span class = 'comment'>";
			}

			else
				{
					$result = $str;
				}
		}
		elseif($type == 1)
		{
			if(stripos($str, "пр") && is_numeric(str_replace("пр", "", $str)))
			{
				$result = "<span class='incWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "сбн") && is_numeric(str_replace("сбн", "", $str))) {
				$result = "<span class='sbnWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "ссн") && is_numeric(str_replace("ссн", "", $str))) {
				$result = "<span class='ssnWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "сс2н") && is_numeric(str_replace("сс2н", "", $str))) {
				$result = "<span class='ss2nWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "сс3н") && is_numeric(str_replace("сс3н", "", $str))) {
				$result = "<span class='ss3nWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "вп") && is_numeric(str_replace("вп", "", $str))) {
				$result = "<span class='vpWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "сс") && is_numeric(str_replace("сс", "", $str))) {
				$result = "<span class='ssWHITE'>".$str."</span>";
			}
			elseif (stripos($str, 'уб')  && is_numeric(str_replace("уб", "", $str))) {
				$result = "<span class='reduceWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "ряд)")  && is_numeric(str_replace("ряд)", "", $str))) {
				$result = "<span class='num_rowseWHITE'>".$str."</span>";
			}
			elseif ($str == "[" || $str == "]" || is_numeric($str)) {
				$result = "<span class='summaWHITE'>".$str."</span>";
			}
			elseif($str == "(" || $str == ")"   || stripos($str, "раз"))
			{
				$result = "<span class='breakWHITE'>".$str."</span>";
			}
			elseif($str == "x")
			{
				$result = "<span class='xsymbolWHITE'>".$str."</span>";
			}
			elseif($str == "[nsh")
			{
				$result = "<span class = 'name_shemaWHITE'><span class = 'fa fa-hashtag'></span> ";
			}
			elseif($str == "nsh]" || $str == "com]")
			{
				$result = "</span>";
			}
			elseif($str == "[com")
			{
				$result = "<span class = 'commentWHITE'>";
			}
			/************************************************************/
			elseif(stripos($str, "inc") && is_numeric(str_replace("inc", "", $str)))
			{
				$result = "<span class='incWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "sc") && is_numeric(str_replace("sc", "", $str))) {
				$result = "<span class='sbnWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "dc") && is_numeric(str_replace("dc", "", $str))) {
				$result = "<span class='ssnWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "tr") && is_numeric(str_replace("tr", "", $str))) {
				$result = "<span class='ss2nWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "dtr") && is_numeric(str_replace("dtr", "", $str))) {
				$result = "<span class='ss3nWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "ch") && is_numeric(str_replace("ch", "", $str))) {
				$result = "<span class='vpWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "SlSt") && is_numeric(str_replace("SlSt", "", $str))) {
				$result = "<span class='ssWHITE'>".$str."</span>";
			}
			elseif (stripos($str, 'dec')  && is_numeric(str_replace("dec", "", $str))) {
				$result = "<span class='reduceWHITE'>".$str."</span>";
			}
			elseif (stripos($str, "rnd)")  && is_numeric(str_replace("rnd)", "", $str))) {
				$result = "<span class='num_rowseWHITE'>".$str."</span>";
			}
			elseif(stripos($str, "rep"))
			{
				$result = "<span class='breakWHITE'>".$str."</span>";
			}

			/************************************************************/

			else
				{
					$result = $str;
				}
		}

		elseif($type == 2)
		{
			if(stripos($str, "пр") && is_numeric(str_replace("пр", "", $str)))
			{
				$result = "<span class='incWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "сбн") && is_numeric(str_replace("сбн", "", $str))) {
				$result = "<span class='sbnWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "ссн") && is_numeric(str_replace("ссн", "", $str))) {
				$result = "<span class='ssnWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "сс2н") && is_numeric(str_replace("сс2н", "", $str))) {
				$result = "<span class='ss2nWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "сс3н") && is_numeric(str_replace("сс3н", "", $str))) {
				$result = "<span class='ss3nWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "вп") && is_numeric(str_replace("вп", "", $str))) {
				$result = "<span class='vpWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "сс") && is_numeric(str_replace("сс", "", $str))) {
				$result = "<span class='ssWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, 'уб')  && is_numeric(str_replace("уб", "", $str))) {
				$result = "<span class='reduceWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "ряд)")  && is_numeric(str_replace("ряд)", "", $str))) {
				$result = "<span class='num_rowseWHITE1'>".$str."</span>";
			}
			elseif ($str == "[" || $str == "]" || is_numeric($str)) {
				$result = "<span class='summaWHITE1'>".$str."</span>";
			}
			elseif($str == "(" || $str == ")"   || stripos($str, "раз"))
			{
				$result = "<span class='breakWHITE1'>".$str."</span>";
			}
			elseif($str == "x")
			{
				$result = "<span class='xsymbolWHITE1'>".$str."</span>";
			}
			elseif($str == "[nsh")
			{
				$result = "<span class = 'name_shemaWHITE1'><span class = 'fa fa-hashtag'></span> ";
			}
			elseif($str == "nsh]" || $str == "com]")
			{
				$result = "</span>";
			}
			elseif($str == "[com")
			{
				$result = "<span class = 'commentWHITE1'>";
			}
			/************************************************************/
			elseif(stripos($str, "inc") && is_numeric(str_replace("inc", "", $str)))
			{
				$result = "<span class='incWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "sc") && is_numeric(str_replace("sc", "", $str))) {
				$result = "<span class='sbnWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "dc") && is_numeric(str_replace("dc", "", $str))) {
				$result = "<span class='ssnWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "tr") && is_numeric(str_replace("tr", "", $str))) {
				$result = "<span class='ss2nWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "dtr") && is_numeric(str_replace("dtr", "", $str))) {
				$result = "<span class='ss3nWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "ch") && is_numeric(str_replace("ch", "", $str))) {
				$result = "<span class='vpWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "SlSt") && is_numeric(str_replace("SlSt", "", $str))) {
				$result = "<span class='ssWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, 'dec')  && is_numeric(str_replace("dec", "", $str))) {
				$result = "<span class='reduceWHITE1'>".$str."</span>";
			}
			elseif (stripos($str, "rnd)")  && is_numeric(str_replace("rnd)", "", $str))) {
				$result = "<span class='num_rowseWHITE1'>".$str."</span>";
			}
			elseif(stripos($str, "rep"))
			{
				$result = "<span class='breakWHITE1'>".$str."</span>";
			}

			/************************************************************/
			else
				{
					$result = $str;
				}
		}

		elseif($type == 3)
		{
			if(stripos($str, "пр") && is_numeric(str_replace("пр", "", $str)))
			{
				$result = "<span class='incBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "сбн") && is_numeric(str_replace("сбн", "", $str))) {
				$result = "<span class='sbnBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "ссн") && is_numeric(str_replace("ссн", "", $str))) {
				$result = "<span class='ssnBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "сс2н") && is_numeric(str_replace("сс2н", "", $str))) {
				$result = "<span class='ss2nBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "сс3н") && is_numeric(str_replace("сс3н", "", $str))) {
				$result = "<span class='ss3nBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "вп") && is_numeric(str_replace("вп", "", $str))) {
				$result = "<span class='vpBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "сс") && is_numeric(str_replace("сс", "", $str))) {
				$result = "<span class='ssBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, 'уб')  && is_numeric(str_replace("уб", "", $str))) {
				$result = "<span class='reduceBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "ряд)")  && is_numeric(str_replace("ряд)", "", $str))) {
				$result = "<span class='num_rowseBLACK1'>".$str."</span>";
			}
			elseif ($str == "[" || $str == "]" || is_numeric($str)) {
				$result = "<span class='summaBLACK1'>".$str."</span>";
			}
			elseif($str == "(" || $str == ")"   || stripos($str, "раз"))
			{
				$result = "<span class='breakBLACK1'>".$str."</span>";
			}
			elseif($str == "x")
			{
				$result = "<span class='xsymbolBLACK1'>".$str."</span>";
			}
			elseif($str == "[nsh")
			{
				$result = "<span class = 'name_shemaBLACK1'><span class = 'fa fa-hashtag'></span> ";
			}
			elseif($str == "nsh]" || $str == "com]")
			{
				$result = "</span>";
			}
			elseif($str == "[com")
			{
				$result = "<span class = 'commentBLACK1'>";
			}

			/************************************************************/
			elseif(stripos($str, "inc") && is_numeric(str_replace("inc", "", $str)))
			{
				$result = "<span class='incBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "sc") && is_numeric(str_replace("sc", "", $str))) {
				$result = "<span class='sbnBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "dc") && is_numeric(str_replace("dc", "", $str))) {
				$result = "<span class='ssnBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "tr") && is_numeric(str_replace("tr", "", $str))) {
				$result = "<span class='ss2nBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "dtr") && is_numeric(str_replace("dtr", "", $str))) {
				$result = "<span class='ss3nBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "ch") && is_numeric(str_replace("ch", "", $str))) {
				$result = "<span class='vpBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "SlSt") && is_numeric(str_replace("SlSt", "", $str))) {
				$result = "<span class='ssBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, 'dec')  && is_numeric(str_replace("dec", "", $str))) {
				$result = "<span class='reduceBLACK1'>".$str."</span>";
			}
			elseif (stripos($str, "rnd)")  && is_numeric(str_replace("rnd)", "", $str))) {
				$result = "<span class='num_rowseBLACK1'>".$str."</span>";
			}
			elseif(stripos($str, "rep"))
			{
				$result = "<span class='breakBLACK1'>".$str."</span>";
			}

			/************************************************************/
			else
				{
					$result = $str;
				}
		}

		return $result;
	}
		public function DeleteAllTegs($text)
		{
			return str_replace($this -> tegsArray, "", $text);
		}

		public function Reinc($text)
		{
			$ar = array("<style>.mainnotes{color:aqua;}</style>",
			 "<style>.mainnotes{color:blue;}</style>",
			 "<style>.mainnotes{color:fuchsia;}</style>",
			 "<style>.mainnotes{color:gray;}</style>",
			 "<style>.mainnotes{color:green;}</style>",

			 "<style>.mainnotes{color:lime;}</style>",
			 "<style>.mainnotes{color:maroon;}</style>",
			 "<style>.mainnotes{color:navy;}</style>",
			 "<style>.mainnotes{color:olive;}</style>",
			 "<style>.mainnotes{color:purple;}</style>",

			 "<style>.mainnotes{color:red;}</style>",
			 "<style>.mainnotes{color:silver;}</style>",
			 "<style>.mainnotes{color:teal;}</style>",
			 "<style>.mainnotes{color:white;}</style>",
			 "<style>.mainnotes{color:yellow;}</style>");
			return str_replace($ar, "", $text);
		}
		public function TrueTextNoImages($text)
		{
			$this -> HTMLtext = str_replace($this -> tegsArray, $this -> tegsArrayNow, $text);
			$this -> HTMLtext = $this -> HTMLtext."</p>";

			/*ИЩЕМ ИЗОБРАЖЕНИЯ В ТЕКСТЕ И МЕНЯЕМ ИХ НА РЕАЛЬНЫЙ КОД*/
			$pattern_img = "/\[img (\w){36}\]/";
			preg_match_all($pattern_img, $this -> HTMLtext, $result);
			$array = $result[0];

			if(count($array) >= 1)
			{
				$newa = $this -> retranslyation($array);

				$this -> HTMLtext = str_replace($array, "", $this -> HTMLtext);
			}
			/*ИЩЕМ СХЕМЫ В ТЕКСТЕ И МЕНЯЕМ ИХ НА РЕАЛЬНЫЙ КОД*/
			$pattern_schema = "/\[schema (\w){36}\]/";
			preg_match_all($pattern_schema, $this -> HTMLtext, $resultS);

			$arrayS = $resultS[0];

			if(count($arrayS) >= 1)
			{

				$newaS = $this -> retranslyationSchema($arrayS);
				$this -> HTMLtext = str_replace($arrayS, $newaS, $this -> HTMLtext);
			}

		}
		public function codeImages($text)
		{
			$this -> HTMLtext = $text;
			/*ИЩЕМ ИЗОБРАЖЕНИЯ В ТЕКСТЕ И МЕНЯЕМ ИХ НА РЕАЛЬНЫЙ КОД*/
			$pattern_img = "/\[img (\w){36}\]/";
			preg_match_all($pattern_img, $this -> HTMLtext, $result);
			$array = $result[0];
			return $array;
		}
		public function TrueTextCardShema($text)
		{
			$this -> HTMLtext = $text;
			/*ИЩЕМ ИЗОБРАЖЕНИЯ В ТЕКСТЕ И МЕНЯЕМ ИХ НА РЕАЛЬНЫЙ КОД*/
			$pattern_img = "/\[img (\w){36}\]/";
			preg_match_all($pattern_img, $this -> HTMLtext, $result);
			$array = $result[0];
			if(count($array) >= 1)
			{
				$newa = $this -> retranslyationColumnCard($array);

				//print_r($newa);
				$this -> HTMLtext = str_replace($array, $newa, $this -> HTMLtext);
			}

		}
		private function retranslyationColumnCard($array)
		{
			$search = new Search();
			$newa = array();

			$ini = parse_ini_file("system.ini");
			$name_site = $ini["name_site"];
			$ramka = "polaroid.tpl";
			$ramka_html = file_get_contents($ini["name_site"]."/core/template/RU/shema/images.tpl");
			$ramka_template = array("%name_site%", "%link%", "%image%");
			for($i = 0; $i <= count($array) - 1; $i++)
			{
				$code = substr($array[$i], 5, -1);
				$data = $search -> ChoiceSearchLike("galery_page", "link", $code);
				$replace = array($name_site, $data[0]["link"], $data[0]["name_image"]);
				$newa[] = str_replace($ramka_template, $replace, $ramka_html);
			}

			return $newa;
		}
		private function retranslyation($array)
		{
			$search = new Search();
			$newa = array();
			$html = file_get_contents("core/template/int/image.tpl");
			$ini = parse_ini_file("system.ini");
			$name_site = $ini["name_site"];
			$ramka = "polaroid.tpl";
			$ramka_html = file_get_contents($ini["name_site"]."/core/template/RU/forpdf/".$ramka);
			$ramka_template = array("%name_site%", "%link%", "%image%");
			for($i = 0; $i <= count($array) - 1; $i++)
			{
				$code = substr($array[$i], 5, -1);
				$data = $search -> ChoiceSearchLike("galery_page", "link", $code);
				$replace = array($name_site, $data[0]["link"], $data[0]["name_image"]);
				$newa[] = str_replace($ramka_template, $replace, $ramka_html);
			}

			return $newa;
		}
		public function retranslyationSchema($text)
		{
			$newa = array();
			$html = file_get_contents(__DIR__."/tm/schema.tm");


			$codeSchema = $this -> visibleCode($text);

			$no = str_replace(array("%code%", "%type_visible%"), array($codeSchema, $this -> styleIp(0)), $html);



			return $no;
		}
		private function retranslyationAhref($array)
		{
			$search = new Search();
			/*
			$html = file_get_contents("core/template/int/schema.tpl");
			$ini = parse_ini_file("system.ini");
			$name_site = $ini["name_site"];
			$template = new Template();*/
			$newa = array();
			for($i = 0; $i <= count($array) - 1; $i++)
			{
				$code = substr($array[$i], 6, -1);
				$newa[] = $code;
			}
			$no = array();
			for ($j=0; $j <= count($newa)-1; $j++) {
				$no[] = "<a href = '".$newa[$j]."' target='_blank'>";
			}

			return $no;
		}
		public function styleIp($key)
		{
			if($key == 0)
			{
				return "";//темная стандартная тема
			}
			elseif($key == 1)
			{
				return "WHITE";
			}
			elseif($key == 2)
			{
				return "WHITE1";
			}
			elseif($key == 2)
			{
				return "BLACK1";
			}
		}
		public function getText()
		{
			return $this -> HTMLtext;
		}

	}
?>