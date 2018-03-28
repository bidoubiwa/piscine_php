#!/usr/bin/php
<?PHP
function	frenchDay_to_english($day)
{
	$day = ucfirst($day);
	$daydict = array(
		"Lundi"  => "Monday",
		"Mardi"	=> "Tuesday",
		"Mercredi" => "Wednesday",
		"Jeudi" => "Thursday",
		"Vendredi" => "Friday",
		"Samedi" => "Saturday",
		"Dimanche" => "Sunday" 
	);
	return ($daydict[$day]);
}

function	month_to_number($month)
{
		$month = ucfirst($month);
		$monthdict = array(
				"Janvier" => "01",
				"Fevrier" => "02",
				"Février" => "02",
				"Mars" => "03",
				"Avril" => "04",
				"Mai" => "05",
				"Juin" => "06",
				"Juillet" => "07",
				"Aout" => "08",
				"Août" => "08",
				"Septembre" => "09",
				"Octobre" => "10",
				"Novembre" => "11",
				"Decembre" => "12",
				"Décembre" => "12",
		);
		if (isset($monthdict[$month]))
				return $monthdict[$month];
		else
				return "42";
}

function	format_year($y)
{		
		if (preg_match("/-0{1,4}/", $y))
				$year = "0000";
		else if ($y < 0)
		{
				$year = str_replace("-", "", $y);
				$year =  str_pad($year,4,"0",STR_PAD_LEFT);
				$year = "-" . $year;
		}
		else
				$year =  str_pad($y, 4,"0",STR_PAD_LEFT);
		return ($year);
}

if ($argc > 1)
{
		$re = '/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) +([1-2]?[0-9]|3[0-1]) +([Jj]anvier|[Ff][eé]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[ûu]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][eé]cembre) +(-?[0-9]{1,4}) +([0-1]?[0-9]|2[0-4]):([0-5]?[0-9]):([0-5]?[0-9])$/';
		preg_match($re, $argv[1], $matches);
		if (count($matches) == 8)
		{
				$month = month_to_number($matches[3]);
				$year = format_year($matches[4]);
				$day = frenchDay_to_english($matches[1]);
				$date = "$day, $year-$month-$matches[2] $matches[5]:$matches[6]:$matches[7]";
				$datetime = new DateTime($date);
				/*var_dump($date);
				echo "\n";
				var_dump($datetime->getTimestamp());
				var_dump($datetime->format("l, Y-m-d H:i:s"));
				echo "\n";*/
				if ($datetime->getTimestamp() && $datetime->format("l, Y-m-d H:i:s") == $date)
						echo $datetime->getTimestamp()."\n";
				else
						echo "Wrong Format\n";
		}	
		else
				echo "Wrong Format\n";
}
?>
