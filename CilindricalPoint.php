<?php

class CilindricalPoint extends Point
{
    protected $f;
    protected $r;
    protected $h;

    /**
     * Создание точки в цилиндрической системе координат
     * @param int|float|string $f - расстояние
     * @param int|float|string $r - угол
     * @param int|float|string $h - аппликата
     */
    public function __construct($f = 0, $r = 0, $h = 0)
    {
        $this->set($f, $r, $h);
    }

    /** Проверяет и устанавливает новые значения свойств расстояния, угла и аппликаты
     * @param int|float|string $param1 - расстояние
     * @param int|float|string $param2 - угол
     * @param int|float|string $param3 - аппликата
     */
    public function set($param1, $param2, $param3)
    {
        if (!is_numeric($param1) || $param1 < 0) {
            exit(__METHOD__ . ": the first parameter must be a positive number, [$param1] given");
        }
        if (!(is_numeric($param2) && ($param2 >= 0) && ($param2 <= 360))){
            exit(__METHOD__ . ": the third parameter must be a number between 0 and 360, [$param2] given");
        }
        $this->f = $param1;
        $this->r = $param2;
        $this->h = $param3;
    }

//    в текущей реализации данный метод не используется, но мне кажется удобной возможность получить массив значений всех координат одним вызовом
    /** Возвращает значения координат точки
     * <p> При значении ключа f/r/h возвращает значение соотвествующего свойства </p>
     * <p> При пустом ключу возвращает массив значений всех свойств </p>
     * <p> В остальных случаях возвращает false </p>
     * @param string $param - ключ с указанием свойства
     * @return int|float|string|array|false
     */
    public function get($param = '')
    {
        switch ($param){
            case 'f': return $this->f;
            case 'r': return $this->r;
            case 'h': return $this->h;
            case '': return ['f' => $this->f, 'r' => $this->r, 'h' => $this->h];
            default: return false;
        }
    }
}