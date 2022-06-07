<?php

require_once('Canvas.php');
require_once('Point.php');
require_once('DecartPoint.php');
require_once('CilindricalPoint.php');
require_once('SphericalPoint.php');

$canvas = new Canvas();

$point1 = new DecartPoint(3, 7, -2);
$point2 = new CilindricalPoint(5, 7, 2);
$point3 = new SphericalPoint(5, 7, 2);

$canvas->paint($point1);
$canvas->paint($point2);
$canvas->paint($point3);
$canvas->line($point1, $point2);
$canvas->line($point1, $point3);
$canvas->line($point2, $point3);
