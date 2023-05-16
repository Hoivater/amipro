<?php
$sbn = floor(($countPrUb * (2 * $current - $prev)) / ($prev - $current));//целое число столбиков без накида
			$ost = ($countPrUb * (2 * $current - $prev)) % ($prev - $current); //остаток от деления, если он есть
			if(($sbn + $countPrUb) != 0)
			{
				$num = $current / ($sbn + $countPrUb);// количество повторов

			}
			else
			{
				$result = "Заданные параметры невозможны...";
			}

		if($ost == 0){	
					if($sbn < 0) 
						$result =  "Заданные параметры невозможны...";
					elseif ($sbn == 0) {
						$result =  "( ".$countPrUb."уб ) x ".$num."раз [ ".$current." ]"; 
					}
					elseif($sbn > 0)
					{
						$result =  "( ".$sbn.$sbn_text." ".$countPrUb."уб ) x ".$num."раз [ ".$current." ]";
					}
				}
			else{
				if($prev/ 2 < $current)
				{
				#ВЫЧИСЛЯЕМ КОЛИЧЕСТВО ПОВТОРОВ НА 1, либо на какие-то доли МЕНЬШЕ, чем есть по факту
				minus:
				$num = floor($num)-1;

				#ВЫЧИСЛЯЕМ КОЛИЧЕСТВО СВОБОДНЫХ ПЕТЕЛЬ ПОСЛЕ ЭТОГО УМЕНЬШЕНИЯ 
				$l = $prev - (2 * $countPrUb + $sbn) * $num;
				
				if($l <= 0){
					goto minus;
				}
				else{
								#ВЫЧИСЛЕНИЯ КОЛИЧЕСТВА ЕЩЕ НУЖНЫХ ПЕТЕЛЬ
								$m = $current - ($countPrUb + $sbn) * $num;

								if($m % $l == 0 && $m == $l)
								{
									$cour = $l.$sbn_text;
								}

								if($m > $l)
								{
									goto minus;
								}
									/*$pr = $m - $l; //количество прибавок
									$nsbn = $l - $pr; //количество сбн
									#Сомнительный случай, нужны прибавки
									$cour = $nsbn.$sbn_text." ".$pr."пр ";
									if($nsbn == 0)
									{
										//$cour = $pr."пр ";
									}*/
									
								
								elseif($m < $l)
								{
									$ub = $l - $m;//уравниваем, получаем чистое количество убавок, остальное - столбики без накида
									$nsbn = $m - $ub;//количество сбн
									$cour = $nsbn.$sbn_text." ".$ub."уб ";
								}

								if($sbn != 0)
								{
									$sbn_W = $sbn."сбн " ;
								}
								else
								{
									$sbn_W = "";
								}

								$generetic = "";
								if($m == $l && $num % $m == 0 && $l != 1)
								{
									//количество повторений для скобок
									$k = $num/$l;
									// echo "количество повторений в скобках: ".$num."<br />";
									// echo "количество лишних сбн:".$m."<br />";
									// echo "количество сбн в скобках: ".$l."<br />";
									// echo "количестов убавок: ".$countPrUb."<br />";
									// echo $sbn."<br />";
									#количество итераций объединения $num;
									
									$tpl = file_get_contents(__DIR__."/../RU/commandline.tpl");
									
									$formula = file_get_contents(__DIR__."/../RU/formula.tpl");

									$tmplate = array("%prev%", "%formula%", "%current%", "%generetic%");

									$template = array("%sbn%", "%ub%", "%count%", "%dop%");
									$dop = $l/$l;
									if(is_numeric($sbn))
									{
										$nnsbn = $sbn.$sbn_text;
									}
									else
										$nnsbn = "";
									$replace = array($nnsbn, $countPrUb."уб ", $k, $dop.$sbn_text." ");
									$resulos = str_replace($template, $replace, $formula);
									$resulo = str_repeat($resulos, $l);
									
									$replce = array($prev, $resulo, $current, $generetic);
									$result = str_replace($tmplate, $replce, $tpl);
								}
								else{
									$result = "( ".$sbn_W.$countPrUb."уб ) x ".$num."раз ".$cour." [ ".$current." ]";
								}
								

								
				}
						
		}
			else
			{
				$result =  "При уменьшении ряда! Из предыдущего ряда можно сделать ряд максимум  длиной минимум в 2 раза меньше, чем он есть. Иначе необходимо использовать тройные убавки. Этого к сожалению пока не предусмотрено =(";
			}
			}
			?>