<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Event;

use Attribute;
use Yiisoft\ActiveRecord\Event\Handler\AttributeHandlerProvider;
use Yiisoft\ActiveRecord\Event\{AfterInsert, AfterUpdate, AfterDelete, BeforeUpdate};

#[Attribute(Attribute::TARGET_CLASS)]
final class ActiveRecordEvent extends AttributeHandlerProvider
{
    public function getEventHandlers(): array
    {
        return [
            BeforeUpdate::class => [$this, 'handleBeforeUpdate'],
            AfterInsert::class => [$this, 'handleAfterInsert'],
            AfterUpdate::class => [$this, 'handleAfterUpdate'],
            AfterDelete::class => [$this, 'handleAfterDelete'],
        ];
    }

    public function handleAfterInsert(AfterInsert $event): void
    {
        $this->callModelMethod($event->model, 'onAfterInsert', $event);
    }

    public function handleBeforeUpdate(BeforeUpdate $event): void
    {
        $this->callModelMethod($event->model, 'onBeforeUpdate', $event);
    }

    public function handleAfterUpdate(AfterUpdate $event): void
    {
        $this->callModelMethod($event->model, 'onAfterUpdate', $event);
    }

    public function handleAfterDelete(AfterDelete $event): void
    {
        $this->callModelMethod($event->model, 'onAfterDelete', $event);
    }

    private function callModelMethod(object $model, string $method, object $event): void
    {
        if (method_exists($model, $method)) {
            $model->{$method}($event);
        }
    }

    public function setPropertyNames(array $names): void {}
}
