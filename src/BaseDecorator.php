<?php

namespace Decorator;

/**
 * Base class for the decorator
 *
 * It's responsible for constructing the decorator and setting the
 * class properties from the given array. Two static functions are
 * exposed to initiate the class either by a single item or a list
 * of items.
 *
 * @author Patrik Sundhäll
 */
class BaseDecorator
{
    /**
     * Holds all the key and values of the decorated array.
     *
     * @var array
     */
    protected $fields;

    /**
     * Loops through the $item array and sets all keys as properties
     * on the class with it's given value.
     *
     * @param array $item
     * @return void
     **/
    public function __construct($item) {
        $this->fields = $item;
        foreach($item as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Decorates the array it's given and returns the called class.
     *
     * @param array $item
     * @return BaseDecorator
     **/
    public static function decorate($item) {
        $class = get_called_class();
        return new $class($item);
    }

    /**
     * Decorates each item in the given array and then returns that
     * array.
     *
     * @param array $list
     * @return array
     **/
    public static function decorate_list($list) {
        $class = get_called_class();
        return array_map(function($item) use ($class) {
            return new $class($item);
        }, $list);
    }
}
