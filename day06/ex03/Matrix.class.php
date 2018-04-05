<?php

class 	Matrix {
	const	IDENTITY = "IDENTITY";
	const	SCALE = "SCALE";
	const	RX = "RX";
	const	RY = "RY";
	const	RZ = "RZ";
	const	TRANSLATION = "TRANSLATION";
	const	PROJECTION = "PROJECTION";
	public	static	$verbose = FALSE;
	private $_matrice = [
		[0,0,0,0],
		[0,0,0,0],
		[0,0,0,0],
		[0,0,0,0]
	];

	function	__construct(array $matrix) {
		if (isset($matrix['preset']))
		{
			if ($matrix['preset'] == SCALE && isset($matrix["scale"])){
				$this->show_verbose("SCALE preset");
				$this->setScale($matrix['scale']);
			}
			else if (($matrix['preset'] == RX || $matrix['preset'] == RY
			|| $matrix['preset'] == RZ) && isset($matrix["angle"])) {
						if ($matrix['preset'] == RX)
						{
							$this->setRx($matrix['angle']);
							$this->show_verbose("Ox ROTATION preset");
						}
						else if ($matrix['preset'] == RY)
						{
							$this->setRy($matrix['angle']);
							$this->show_verbose("Oy ROTATION preset");
						}
						else if ($matrix['preset'] == RZ)
						{
							$this->setRz($matrix['angle']);
							$this->show_verbose("Oz ROTATION preset");
						}
					}
			else if	($matrix['preset'] == TRANSLATION && isset($matrix["vtc"])){
				$this->setTranslation($matrix['vtc']);
				$this->show_verbose("TRANSLATION preset");
			}

			else if ($matrix['preset'] == PROJECTION && isset($matrix["fov"]) &&
			isset($matrix['ratio']) && isset($matrix['near']) && isset($matrix['far'])) {

						$this->setProjection($matrix['fov'], $matrix['ratio'], $matrix['near'], $matrix['far']);
						$this->show_verbose("PROJECTION preset");
			}
			else
			{
				$this->setIdentity();
				$this->show_verbose("IDENTITY");
			}
		}
	}
	private function setIdentity()
	{
		$this->_matrice = [
			[1,0,0,0],
			[0,1,0,0],
			[0,0,1,0],
			[0,0,0,1]
		];
	}

	private function setScale($scale) {
		$this->_matrice = [
			[$scale,0,0,0],
			[0,$scale,0,0],
			[0,0,$scale,0],
			[0,0,0,1]
		];
	}

 	private	function	setTranslation(Vector $vtc) {
		$this->_matrice = [
		 [1,0,0,$vtc->getX()],
		 [0,1,0,$vtc->getY()],
		 [0,0,1,$vtc->getZ()],
		 [0,0,0,1]
	 ];
	}

 	private	function	setRx($angle) {
		$this->_matrice = [
			[1,0,0,0],
			[0,cos($angle),-sin($angle),0],
			[0,sin($angle),cos($angle),0],
			[0,0,0,1]
		];
	}

 	private	function	setRy($angle) {
		$this->_matrice = [
			[cos($angle),0,sin($angle),0],
			[0,1,0,0],
			[-sin($angle),0,cos($angle),0],
			[0,0,0,1]
		];
	}

 	private	function	setRz($angle){
		$this->_matrice = [
			[cos($angle),-sin($angle),0,0],
			[sin($angle),cos($angle),0,0],
			[0,0,1,0],
			[0,0,0,1]
		];
	}

 	private	function	setProjection($fov, $ratio, $near, $far) {
		$s = 1.0 / (tan(deg2rad($fov) / 2) * $ratio);
		$s2 = 1.0 / tan(deg2rad($fov) / 2);
		$this->_matrice = [
			[$s,0,0,0],
			[0,$s2,0,0],
			[0,0,(($near + $far) / ($near - $far)),2 * (($far * $near) / ($near -  $far))],
			[0,0,-1,0]
		];
	}

	private function show_verbose($keyword)
	{
		if (self::$verbose)
				print("Matrix $keyword instance constructed" . PHP_EOL);
	}

	function	mult(Matrix $rhs) {
		$ret = clone $this;
		$m1 = $this->_matrice;
		$m2 = $rhs->_matrice;
		$new = [
			[
				$m1[0][0] * $m2[0][0] + $m1[0][1] * $m2[1][0] + $m1[0][2] * $m2[2][0] + $m1[0][3] * $m2[3][0],
				$m1[0][0] * $m2[0][1] + $m1[0][1] * $m2[1][1] + $m1[0][2] * $m2[2][1] + $m1[0][3] * $m2[3][1],
				$m1[0][0] * $m2[0][2] + $m1[0][1] * $m2[1][2] + $m1[0][2] * $m2[2][2] + $m1[0][3] * $m2[3][2],
				$m1[0][0] * $m2[0][3] + $m1[0][1] * $m2[1][3] + $m1[0][2] * $m2[2][3] + $m1[0][3] * $m2[3][3]
			],
			[
				$m1[1][0] * $m2[0][0] + $m1[1][1] * $m2[1][0] + $m1[1][2] * $m2[2][0] + $m1[1][3] * $m2[3][0],
				$m1[1][0] * $m2[0][1] + $m1[1][1] * $m2[1][1] + $m1[1][2] * $m2[2][1] + $m1[1][3] * $m2[3][1],
				$m1[1][0] * $m2[0][2] + $m1[1][1] * $m2[1][2] + $m1[1][2] * $m2[2][2] + $m1[1][3] * $m2[3][2],
				$m1[1][0] * $m2[0][3] + $m1[1][1] * $m2[1][3] + $m1[1][2] * $m2[2][3] + $m1[1][3] * $m2[3][3]
			],
			[
				$m1[2][0] * $m2[0][0] + $m1[2][1] * $m2[1][0] + $m1[2][2] * $m2[2][0] + $m1[2][3] * $m2[3][0],
				$m1[2][0] * $m2[0][1] + $m1[2][1] * $m2[1][1] + $m1[2][2] * $m2[2][1] + $m1[2][3] * $m2[3][1],
				$m1[2][0] * $m2[0][2] + $m1[2][1] * $m2[1][2] + $m1[2][2] * $m2[2][2] + $m1[2][3] * $m2[3][2],
				$m1[2][0] * $m2[0][3] + $m1[2][1] * $m2[1][3] + $m1[2][2] * $m2[2][3] + $m1[2][3] * $m2[3][3]
			],
			[
				$m1[3][0] * $m2[0][0] + $m1[3][1] * $m2[1][0] + $m1[3][2] * $m2[2][0] + $m1[3][3] * $m2[3][0],
				$m1[3][0] * $m2[0][1] + $m1[3][1] * $m2[1][1] + $m1[3][2] * $m2[2][1] + $m1[3][3] * $m2[3][1],
				$m1[3][0] * $m2[0][2] + $m1[3][1] * $m2[1][2] + $m1[3][2] * $m2[2][2] + $m1[3][3] * $m2[3][2],
				$m1[3][0] * $m2[0][3] + $m1[3][1] * $m2[1][3] + $m1[3][2] * $m2[2][3] + $m1[3][3] * $m2[3][3]
			]
		];
		$ret->_matrice = $new;
		return $ret;
	}

	function	transformVertex(Vertex $vtx) {
		$m = $this->_matrice;
		$x = $m[0][0] * $vtx->getX() + $m[0][1] * $vtx->getY() + $m[0][2] * $vtx->getZ() + $m[0][3] * $vtx->getW();
		$y = $m[1][0] * $vtx->getX() + $m[1][1] * $vtx->getY() + $m[1][2] * $vtx->getZ() + $m[1][3] * $vtx->getW();
		$z = $m[2][0] * $vtx->getX() + $m[2][1] * $vtx->getY() + $m[2][2] * $vtx->getZ() + $m[2][3] * $vtx->getW();
		$w = $m[3][0] * $vtx->getX() + $m[3][1] * $vtx->getY() + $m[3][2] * $vtx->getZ() + $m[3][3] * $vtx->getW();
		return new Vertex(array('x' => $x, 'y' => $y, 'z' => $z, 'w' => $w));
	}

	function	doc() {
		return file_get_contents("Matrix.doc.txt");
	}

	function	__destruct() {
		if (self::$verbose)
			print("Matrix instance destructed" . PHP_EOL);
	}

	function	__toString() {
		$str1 = "M | vtcX | vtcY | vtcZ | vtxO" . PHP_EOL;
		$str2 = "-----------------------------" . PHP_EOL;
		$str3 = vsprintf("x | %.2f | %.2f | %.2f | %.2f" . PHP_EOL,
				[
					$this->_matrice[0][0],
					$this->_matrice[0][1],
					$this->_matrice[0][2],
					$this->_matrice[0][3]
				]);
		$str4 = vsprintf("y | %4.2f | %.2f | %.2f | %.2f" . PHP_EOL,
				[
					$this->_matrice[1][0],
					$this->_matrice[1][1],
					$this->_matrice[1][2],
					$this->_matrice[1][3]
				]);
		$str5 = vsprintf("z | %.2f | %.2f | %.2f | %.2f" . PHP_EOL,
				[
					$this->_matrice[2][0],
					$this->_matrice[2][1],
					$this->_matrice[2][2],
					$this->_matrice[2][3]
				]);
		$str6 = vsprintf("w | %.2f | %.2f | %.2f | %.2f",
				[
					$this->_matrice[3][0],
					$this->_matrice[3][1],
					$this->_matrice[3][2],
					$this->_matrice[3][3]
				]);
		return $str1 . $str2 . $str3 . $str4 . $str5 . $str6;
	}
}

?>
