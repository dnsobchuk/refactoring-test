<?php

$canvas = new Canvas();

$point = new DecartPoint();

$point->x = 5;
$point->y = 7;
$point->z = -2;

$canvas->paint($point);

$point = new CilindricalPoint();

$point->f = 5;
$point->r = 7;
$point->h = -2;

$canvas->paint($point);

$point = new SphericalPoint();

$point->r = 5;
$point->f = 7;
$point->t = -2;

$canvas->paint($point);