<?php

use PHPUnit\Framework\TestCase;
use Alberto\Container;

class ContainerTest extends TestCase
{
    public function test_bind_form_closure()
    {
        $container = new Container();

        $container->bind('key', function () {
            return 'Object';
        });

        $this->assertSame('Object', $container->make('key'));
    }

    public function test_bind_instace()
    {
        $container = new Container();

        $stdClass = new StdClass();

        $container->instance('key', $stdClass);

        $this->assertSame($stdClass, $container->make('key'));
    }


    public function test_bind_from_class_name()
    {
        $container = new Container();

        $container->bind('key', 'StdClass');

        $this->assertInstanceOf('StdClass', $container->make('key'));
    }

    public function test_bind_with_automatic_resolution()
    {
        $container = new Container();

        $container->bind('foo', 'Foo');

        $this->assertInstanceOf('Foo', $container->make('foo'));
    }
}
class Foo
{
    public function __construct(Bar $bar)
    {

    }
}
class Bar {
    public function __construct(FooBar $fooBar)
    {
    }
}
class FooBar{
    
}
