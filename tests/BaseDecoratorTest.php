<?php

use Decorator\BaseDecorator;

class BaseDecoratorTest extends PHPUnit_Framework_TestCase
{
    protected $decorator_data;

    protected function setUp()
    {
        $this->decorator_data = array(
            'existing_field' => 'existing_value'
        );
    }

    public function testKeysGetTransformedToVariable()
    {
        $decorator = BaseDecorator::decorate($this->decorator_data);

        $this->assertEquals('existing_value', $decorator->existing_field);
    }


    public function testItCanHandleListsOfItems()
    {
        $list = array(
            array('item_name' => 'Item 1'),
            array('item_name' => 'Item 2'),
            array('item_name' => 'Item 3'),
            array('item_name' => 'Item 4')
        );
        $decorated_list = BaseDecorator::decorate_list($list);

        $this->assertCount(4, $decorated_list);
        $this->assertEquals('Item 1', $decorated_list[0]->item_name);
        $this->assertEquals('Item 2', $decorated_list[1]->item_name);
        $this->assertEquals('Item 3', $decorated_list[2]->item_name);
        $this->assertEquals('Item 4', $decorated_list[3]->item_name);
    }
}
