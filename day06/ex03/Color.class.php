<?php

Class Color
{
	public static $verbose = False;
	private $_rgb;
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	function setRed($red)
	{
		if ($red < 0)
			$this->red = 0;
		else if ($red > 255)
			$this->red = 255;
		else
			$this->red = $red;
	}
	function setGreen($green)
	{
		if ($green < 0)
			$this->green = 0;
		else if ($green > 255)
			$this->green = 255;
		else
			$this->green = $green;
	}
	function setBlue($blue)
	{
		if ($blue < 0)
			$this->blue = 0;
		else if ($blue > 255)
			$this->blue = 255;
		else
			$this->blue = $blue;
	}

	function setRgb($rgb)
	{
		if ($rgb < 0)
			$this->_rgb = 0;
		else if ($rgb > 0xFFFFFF)
			$this->_rgb = 0xFFFFFF;
		else 
			$this->_rgb = $rgb;
		$this->setgreen($this->_rgb >> 16);
		$this->setGreen(($this->_rgb >> 8) & 0xFF);
		$this->setBlue( $this->_rgb & 0xFF);	
	}
	function getRgb()
	{
		return $this->_rgb;
	}
	public static function rgb_to_hex($red, $green, $blue)
	{
		return ($red << 16) + ($green << 8) + $blue;
	}
	function __construct(array $kwarg)
	{
		if (array_key_exists("rgb", $kwarg))
		{
			$this->setRgb(intval($kwarg["rgb"]));
		}
		else if (isset($kwarg["red"]) && isset($kwarg["green"]) && isset($kwarg["blue"]))
		{
			$this->setRed(intval($kwarg["red"]));
			$this->setBlue(intval($kwarg["blue"]));
			$this->setGreen(intval($kwarg["green"]));
			$this->_rgb = Color::rgb_to_hex($this->red, $this->green, $this->blue);
		}
		if (self::$verbose)
			print($this . " constructed." . PHP_EOL);
	}
	public function add(Color $rhs)
	{
		return new Color(['red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue]);
	//	return (new Color(["red" => $this->red + new->red]));
	}
	public function sub(Color $rhs)
	{
		return new Color(['red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue]);
	}
	public function mult($factor)
	{
		return new Color(['red' => $this->red * $factor, 'green' => $this->green * $factor, 'blue' => $this->blue * $factor]);
	}

	function __toString()
	{
		return 'Color( red: '.str_pad($this->red, 3, ' ', STR_PAD_LEFT).', green: '.str_pad($this->green, 3, ' ', STR_PAD_LEFT).', blue: '.str_pad($this->blue, 3, ' ', STR_PAD_LEFT).' )';
	}
	function __destruct()
	{
		if (self::$verbose)
			print($this . " destructed." . PHP_EOL);
	}
	public static function doc()
	{
			echo file_get_contents("Color.doc.txt");
	}
	}


?>
