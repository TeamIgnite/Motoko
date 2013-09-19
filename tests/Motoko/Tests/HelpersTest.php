<?php

namespace Motoko\Tests;

/**
 * Class HelpersTest
 * This was generously stolen from Laravel's Support Tests.
 *
 *
 * @package Motoko\Tests
 */
class HelpersTest extends AbstractTest {

    public function testArrayBuild() {
        $this->assertEquals(array('foo' => 'bar'), array_build(array('foo' => 'bar'), function ($key, $value) {
            return array($key, $value);
        }));
    }


    public function testArrayDot() {
        $array = array_dot(array('name' => 'taylor', 'languages' => array('php' => true)));
        $this->assertEquals($array, array('name' => 'taylor', 'languages.php' => true));
    }


    public function testArrayGet() {
        $array = array('names' => array('developer' => 'taylor'));
        $this->assertEquals('taylor', array_get($array, 'names.developer'));
        $this->assertEquals('dayle', array_get($array, 'names.otherDeveloper', 'dayle'));
        $this->assertEquals('dayle', array_get($array, 'names.otherDeveloper', function () {
            return 'dayle';
        }));
    }


    public function testArraySet() {
        $array = array();
        array_set($array, 'names.developer', 'taylor');
        $this->assertEquals('taylor', $array['names']['developer']);
    }


    public function testArrayForget() {
        $array = array('names' => array('developer' => 'taylor', 'otherDeveloper' => 'dayle'));
        array_forget($array, 'names.developer');
        $this->assertFalse(isset($array['names']['developer']));
        $this->assertTrue(isset($array['names']['otherDeveloper']));
    }


    public function testArrayPluck() {
        $array = array(array('name' => 'taylor'), array('name' => 'dayle'));
        $this->assertEquals(array('taylor', 'dayle'), array_pluck($array, 'name'));
    }


    public function testArrayExcept() {
        $array = array('name' => 'taylor', 'age' => 26);
        $this->assertEquals(array('age' => 26), array_except($array, array('name')));
    }


    public function testArrayOnly() {
        $array = array('name' => 'taylor', 'age' => 26);
        $this->assertEquals(array('name' => 'taylor'), array_only($array, array('name')));
    }


    public function testArrayDivide() {
        $array = array('name' => 'taylor');
        list($keys, $values) = array_divide($array);
        $this->assertEquals(array('name'), $keys);
        $this->assertEquals(array('taylor'), $values);
    }


    public function testArrayFirst() {
        $array = array('name' => 'taylor', 'otherDeveloper' => 'dayle');
        $this->assertEquals('dayle', array_first($array, function ($key, $value) {
            return $value == 'dayle';
        }));
    }


    public function testArrayFetch() {
        $data = array(
            'post-1' => array(
                'comments' => array(
                    'tags' => array(
                        '#foo', '#bar',
                    ),
                ),
            ),
            'post-2' => array(
                'comments' => array(
                    'tags' => array(
                        '#baz',
                    ),
                ),
            ),
        );

        $this->assertEquals(array(
            0 => array(
                'tags' => array(
                    '#foo', '#bar',
                ),
            ),
            1 => array(
                'tags' => array(
                    '#baz',
                ),
            ),
        ), array_fetch($data, 'comments'));

        $this->assertEquals(array(array('#foo', '#bar'), array('#baz')), array_fetch($data, 'comments.tags'));
    }


    public function testArrayFlatten() {
        $this->assertEquals(array('#foo', '#bar', '#baz'), array_flatten(array(array('#foo', '#bar'), array('#baz'))));
    }

    public function testValue() {
        $this->assertEquals('foo', value('foo'));
        $this->assertEquals('foo', value(function () {
            return 'foo';
        }));
    }


    public function testObjectGet() {
        $class = new \StdClass;
        $class->name = new \StdClass;
        $class->name->first = 'Taylor';

        $this->assertEquals('Taylor', object_get($class, 'name.first'));
    }


    public function testArraySort() {
        $array = array(
            array('name' => 'baz'),
            array('name' => 'foo'),
            array('name' => 'bar'),
        );

        $this->assertEquals(array(
                array('name' => 'bar'),
                array('name' => 'baz'),
                array('name' => 'foo')),
            array_values(array_sort($array, function ($v) {
                return $v['name'];
            })));
    }
}
