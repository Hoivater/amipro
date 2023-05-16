<?php
	$msbn = ($countPrUb * (2 * $prev - $current)) / ($current - $prev);

	$num = $prev / ($msbn + $countPrUb);
	ystrat:
	if(is_int($num))
	{
    $generetic = "";
		if(is_int($msbn) && $msbn >= 0)
		{
			if($msbn == 0)
			{
				$construc = "";
			}
			else
			{
				$construc = $msbn.$sbn_text;
			}
			$generetic = "";
			$result =  " ( ".$construc." ".$countPrUb."пр ) x ".$num."раз [ ".$current." ]";
		}
		elseif(!is_int($msbn))
		{
			$msbn = floor($msbn);
			if($msbn == 0)
			{
				$resSbn = "";
				$ostPrev = $prev - ($msbn+$countPrUb)*$num;
				$ostCurrent = $current - ($msbn+$countPrUb*2)*$num;
				//$dop = "<br />Остаток в прошлом ряду ".$ostPrev."<br /> Остаток в новом ряду ".$ostCurrent;
				if($ostPrev <= $ostCurrent)
				{
					$dop = $this -> OstPrib($ostPrev, $ostCurrent, $sbn_text, $num, $prev, $current, $generetic, $msbn, $countPrUb);//.$dop;
					if($dop["1"] == "mno")
					{
						$result = $dop[0];
					}
					else
						$dop = $dop[0];
				}
				else
				{
					#тот случай, когда петель в новом ряду не осталось, и наоборот есть лишние. 
					#Нужно уменьшать num;
					$num = $num-1;
					goto ystrat; 
				}

				//$result = "3ряд) ( ".$resSbn." ".$countPrUb."пр ) x ".$num."раз ".$dop;
				if($dop[1] != "mno")
			$result = " ( ".$resSbn." ".$countPrUb."пр ) x ".$num."раз ".$dop." [ ".$current." ]";
		
			}
			elseif($msbn > 0)
			{
				$ostPrev = $prev - ($msbn+$countPrUb)*$num;
				$ostCurrent = $current - ($msbn+$countPrUb*2)*$num;

				//$dop = "<br />!Остаток в прошлом ряду ".$ostPrev."<br /> Остаток в новом ряду ".$ostCurrent;
				$resSbn = $msbn.$sbn_text;
				if($ostPrev <= $ostCurrent)
				{
					//$dop = OstPrib($ostPrev, $ostCurrent, $sbn_text).$dop;
					
					$dop = $this -> OstPrib($ostPrev, $ostCurrent, $sbn_text, $num, $prev, $current, $generetic, $msbn, $countPrUb);
					
					if($dop["1"] == "mno")
					{
						$result = $dop[0];
					}
					else{
						$dop = $dop[0];
						}
					//.$dop;
					//$result =  $dop."<br />";
				}
				else
				{
					#тот случай, когда петель в новом ряду не осталось, и наоборот есть лишние. 
					#Нужно уменьшать num;
					//echo "Уменьшение num...<br />";
					$num = $num-1;
					goto ystrat; 
				}

				//$result = "3ряд) ( ".$resSbn." ".$countPrUb."пр ) x ".$num."раз ".$dop;
					if($dop["1"] != "mno"){
					$result = "( ".$resSbn." ".$countPrUb."пр ) x ".$num."раз ".$dop." [ ".$current." ]";
				}
			}
			else
			{
				$result = "При увеличении ряда! Из предыдущего ряда можно сделать ряд максимум  длиной максимем в 2 раза длиннее, чем он есть. Иначе необходимо использовать тройные прибавки. Этого к сожалению пока не предусмотрено =(";
			}

			}
	}
	else
	{
		//echo "Корректировка num...<br />";
		$num = (int)floor($num);
		goto ystrat;
	}

?>