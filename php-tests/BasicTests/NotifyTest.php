<?php

namespace BasicTests;


use CommonTestClass;
use kalanis\kw_notify\Extend\StackName;
use kalanis\kw_notify\Interfaces\INotify;
use kalanis\kw_notify\Notification;
use kalanis\kw_notify\Stack;


class NotifyTest extends CommonTestClass
{
    public function testStack(): void
    {
        $stack = new Stack(new \ArrayObject());
        $stack->add('abc', 'def');
        $stack->add('ghi', 'jkl');
        $stack->add('ghi', 'mno');
        $stack->add('ghi', 'pqr');
        $this->assertEquals(['def'], $stack->get('abc'));
        $this->assertEquals(['jkl', 'mno', 'pqr', ], $stack->get('ghi'));
    }

    public function testStackName(): void
    {
        $stack = new Stack(new \ArrayObject());
        $stackName = new StackName($stack, 'pre_', '_post');
        $stackName->add('abc', 'def');
        $stackName->add('ghi', 'jkl');
        $stackName->add('ghi', 'mno');
        $this->assertTrue($stackName->check('abc'));
        $this->assertFalse($stackName->check('def'));
        $this->assertEquals(['def'], $stack->get('pre_abc_post'));
        $this->assertEquals(['jkl', 'mno', ], $stack->get('pre_ghi_post'));
        $stackName->reset('abc');

        $stackName = new StackName($stack, '', '_po');
        $stackName->add('abc', 'def');
        $this->assertEquals(['def'], $stack->get('abc_po'));
        $this->assertEquals(['def'], $stackName->get('abc'));
    }

    public function testNotify(): void
    {
        $stack = new Stack(new \ArrayObject());
        Notification::init($stack);
        $this->assertEmpty(Notification::getNotify()->get(INotify::TARGET_WARNING));
        $this->assertEmpty(Notification::getNotify()->get(INotify::TARGET_SUCCESS));
        Notification::addInfo('abc');
        Notification::addInfo('def');
        Notification::addWarning('ghi');
        Notification::addError('jkl');
        Notification::addSuccess('mno');

        $this->assertEquals(['abc', 'def'], $stack->get(INotify::TARGET_INFO));
        $this->assertEquals(['ghi'], $stack->get(INotify::TARGET_WARNING));
        $this->assertEquals(['abc', 'def', ], Notification::getNotify()->get(INotify::TARGET_INFO));
        $this->assertEquals(['ghi', ], Notification::getNotify()->get(INotify::TARGET_WARNING));
        $this->assertEquals(['jkl', ], Notification::getNotify()->get(INotify::TARGET_ERROR));
        $this->assertEquals(['mno', ], Notification::getNotify()->get(INotify::TARGET_SUCCESS));
    }
}
