<?php

/**
 * Class SphericalPoint
 * реализует точки в сферический системе координат
 */
class SphericalPoint extends Point
{
    protected $r;
    protected $f;
    protected $t;

    /**
     * Создание точки в сферической системе координат
     * @param int|float|string $r - расстояние
     * @param int|float|string $f - наклонение
     * @param int|float|string $t - азимут
     */
    public function __construct($r = 0, $f = 0, $t = 0)
    {
        $this->set($r, $f, $t);
    }

    /** Проверяет и устанавливает новые значения свойства расстояния, наклонения и азимута
     * @param int|float|string $param1 - расстояние
     * @param int|float|string $param2 - наклонение
     * @param int|float|string $param3 - азимут
     */
    public function set($param1, $param2, $param3)
    {
        if (!is_numeric($param1) || $param1 < 0) {
            exit(__METHOD__ . ": the first parameter must be a positive number, [$param1] given.");
        }
        if (!(is_numeric($param2) && ($param2 >= 0) && ($param2 <= 180))) {
            exit(__METHOD__ . ": the second parameter must be a number between 0 and 180, [$param2] given");
        }
        if (!(is_numeric($param3) && ($param3 >= 0) && ($param3 <= 360))) {
            exit(__METHOD__ . ": the third parameter must be a number between 0 and 360, [$param3] given");
        }
        $this->r = $param1;
        $this->f = $param2;
        $this->t = $param3;
    }

//    в текущей реализации данный метод не используется, но мне кажется удобной возможность получить массив значений всех координат одним вызовом
    /** Возвращает значения координат точки
     * <p> При значении ключа r/f/t возвращает значение соотвествующего свойства </p>
     * <p> При пустом ключу возвращает массив значений всех свойств </p>
     * <p> В остальных случаях возвращает false </p>
     * @param string $param - ключ с указанием свойства
     * @return int|float|string|array|false
     */
    public function get($param = '')
    {
        switch ($param){
            case 'r': return $this->r;
            case 'f': return $this->f;
            case 't': return $this->t;
            case '': return ['r' => $this->r, 'f' => $this->f, 't' => $this->t];
            default: return false;
        }
    }
}