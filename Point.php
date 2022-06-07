<?php

/**
 * Class Point
 */
abstract class Point
{
    //  в текущей реализации метод не используется, но оставим его на вырост
    /** Проверяет наличие поля в объекте и устанавливает его значение
     * @param $field - свойство точки
     * @param $value - новое значение свойства
     */
    public function __set($field, $value)
    {
        if (!property_exists($this, $field)) {
            exit(__METHOD__ . ": call to undefined property [$field]");
        }
        if (!is_numeric($value)) {
            exit(__METHOD__ . ": numeric parameter expected, [$value] given");
        }
        $this->$field = $value;
    }

    /** Проверяет наличие поля в объекте и возвращает его значение
     * @param $field - свойство точки
     * @return mixed - значение свойства
     */
    public function __get($field)
    {
        if (property_exists($this, $field)) {
            return $this->$field;
        }
        exit(__METHOD__ . ": call to undefined property [$field]");
    }

    abstract protected function set($param1, $param2, $param3);
    abstract protected function get($param);
}