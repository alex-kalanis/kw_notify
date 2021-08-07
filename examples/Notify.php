<?php

namespace kalanis\kw_notify\examples;

/// in bootstrap:

\kalanis\kw_notify\Notification::init(
    new \kalanis\kw_notify\Extend\StackName(
        new \kalanis\kw_notify\Stack(
            new \kalanis\kw_input\Extras\SessionAdapter() // access sessions in object
        ), 'kwnotif_'
    )
);

/// then in extra files:

use kalanis\kw_notify\Interfaces\INotify;
use kalanis\kw_notify\Notification;


/**
 * Class Notify
 * @package kalanis\kw_notify\examples
 * Example of notifications - usage in
 */
class Notify
{
    protected static $cssClasses = [
        INotify::TARGET_ERROR => 'alert-box-danger',
        INotify::TARGET_WARNING => 'alert-box-warning',
        INotify::TARGET_SUCCESS => 'alert-box-success',
        INotify::TARGET_INFO => 'alert-box-info',
    ];

    public function output(): string
    {
        $tmpl = new Template();
        $notifications = [];
        if (Notification::getNotify()) {
            foreach (static::$cssClasses as $type => $cssClass) {
                foreach (Notification::getNotify()->get($type) as $message) {
                    $notifications[] = $tmpl->reset()->setData(Lang::get($type), $message, $cssClass)->render();
                }
                // clear displayed
                Notification::getNotify()->reset($type);
            }
        }
        return implode('', $notifications);
    }
}


/**
 * Class Template
 * @package kalanis\kw_notify\examples
 */
class Template extends ATemplate
{
    protected $moduleName = 'Notify';
    protected $templateName = 'template';

    protected function fillInputs(): void
    {
        $this->addInput('{CONTENT_CLASS}');
        $this->addInput('{BOLD_TEXT}');
        $this->addInput('{CONTENT_TEXT}');
    }

    public function setData(string $type, string $message, string $class = ''): self
    {
        $this->updateItem('{BOLD_TEXT}', $type);
        $this->updateItem('{CONTENT_TEXT}', $message);
        $this->updateItem('{CONTENT_CLASS}', $class);
        return $this;
    }
}
