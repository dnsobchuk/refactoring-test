<?php

/**
 * Class DecartPoint
 * реализует точки в декартовой системе координат
 */
class DecartPoint extends Point
{
    protected $x;
    protected $y;
    protected $z;

    /**
     * Создание точки в декартовой системе координат
     * @param int|float|string $x - координата x
     * @param int|float|string $y - координата y
     * @param int|float|string $z - координата z
     */
    public function __construct($x = 0, $y = 0, $z = 0)
    {
        $this->set($x, $y, $z);
    }

    /** Проверяет и устанавливает новые значения координат x, y, z
     * @param int|float|string $param1 - координата x
     * @param int|float|string $param2 - координата y
     * @param int|float|string $param3 - координата z
     */
    public function set($param1, $param2, $param3)
    {
        if (!is_numeric($param1)) {
            exit(__METHOD__ . ": the first parameter must be numeric, [$param1] given");
        }
        if (!is_numeric($param2)) {
            exit(__METHOD__ . ": the second parameter must be numeric, [$param2] given");
        }
        if (!is_numeric($param3)) {
            exit(__METHOD__ . ": the third parameter must be numeric, [$param3] given");
        }
        $this->x = $param1;
        $this->y = $param2;
        $this->z = $param3;
    }

//    в текущей реализации данный метод не используется, но мне кажется удобной возможность получить массив значений всех координат одним вызовом
    /** Возвращает значения координат точки
     * <p> При значении ключа x/y/z возвращает значение соотвествующей координаты </p>
     * <p> При пустом ключу возвращает массив значений всех координат </p>
     * <p> В остальных случаях возвращает false </p>
     * @param string $param - ключ с указанием коордитнаты
     * @return int|float|string|array|false
     */
    public function get($param = '')
    {
        switch ($param){
            case 'x': return $this->x;
            case 'y': return $this->y;
            case 'z': return $this->z;
            case '': return ['x' => $this->x, 'y' => $this->y, 'z' => $this->z];
            default: return false;
        }
    }
}