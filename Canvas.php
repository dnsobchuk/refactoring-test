<?php

/**
 * Class Canvas
 * Полотно для отрисовки объектов
 */
class Canvas
{
    /** Определение положения точки в декартовой системе координат
     * @param Point $point - точка в декартовой, сферической или цилиндрической системе координат
     * @return array - массив значений координат с индексами x,y,z; пустой массив в случае ошибки
     */
    private function getCoords(Point $point): array
    {
        $coords = [];
        if ($point instanceof DecartPoint) {
            $coords = [
                'x' => $point->x,
                'y' => $point->y,
                'z' => $point->z
            ];
        } elseif ($point instanceof CilindricalPoint) {
            $coords = [
                'x' => $point->r * cos($point->f),
                'y' => $point->r * sin($point->f),
                'z' => $point->h
            ];
        } elseif ($point instanceof SphericalPoint) {
            $coords = [
                'x' => $point->r * cos($point->f) * sin($point->t),
                'y' => $point->r * sin($point->f) * cos($point->t),
                'z' => $point->r * cos($point->t)
            ];
        }
        return $coords;
    }


    /** Отрисовка точки на канвасе
     * @param Point $point - точка
     */
    public function paint(Point $point)
    {
        $coords = $this->getCoords($point);
        if (!empty($coords)) {
            echo "[x = {$coords['x']}; y = {$coords['y']}; z = {$coords['z']}]", PHP_EOL;
        }
    }


    /** Рисование линии на канвасе по двум точкам
     * @param Point $from - точка начала линии
     * @param Point $to - точка конца линии
     */
    public function line(Point $from, Point $to)
    {
        $fromCoords = $this->getCoords($from);
        $toCoords = $this->getCoords($to);
        if (!empty($fromCoords) && !empty($toCoords)){
            echo "[x = {$fromCoords['x']}; y = {$fromCoords['y']}; z = {$fromCoords['z']}] - ",
                "[x = {$toCoords['x']}; y = {$toCoords['y']}; z = {$toCoords['z']}]", PHP_EOL;
        }
    }
}