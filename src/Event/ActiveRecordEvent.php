<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Event;

use Attribute;
use Yiisoft\ActiveRecord\Event\Handler\AttributeHandlerProvider;
use Yiisoft\ActiveRecord\Event\{AfterInsert, AfterUpdate, AfterDelete, BeforeDelete, BeforeInsert, BeforeUpdate};

/**
 * ActiveRecordEvent
 *
 * An attribute that provides event handlers for ActiveRecord models.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class ActiveRecordEvent extends AttributeHandlerProvider
{
    /**
     * Returns the event handlers.
     *
     * @return array The event handlers.
     */
    public function getEventHandlers(): array
    {
        return [
            BeforeInsert::class => [$this, 'handleBeforeInsert'],
            BeforeUpdate::class => [$this, 'handleBeforeUpdate'],
            AfterInsert::class => [$this, 'handleAfterInsert'],
            AfterUpdate::class => [$this, 'handleAfterUpdate'],
            BeforeDelete::class => [$this, 'handleBeforeDelete'],
            AfterDelete::class => [$this, 'handleAfterDelete'],
        ];
    }

    /**
     * Handles the BeforeInsert event.
     *
     * @param BeforeInsert $event The event.
     */
    public function handleBeforeInsert(BeforeInsert $event): void
    {
        $this->callModelMethod($event->model, 'onBeforeInsert', $event);
    }


    /**
     * Handles the AfterInsert event.
     *
     * @param AfterInsert $event The event.
     */
    public function handleAfterInsert(AfterInsert $event): void
    {
        $this->callModelMethod($event->model, 'onAfterInsert', $event);
    }

    /**
     * Handles the BeforeUpdate event.
     *
     * @param BeforeUpdate $event The event.
     */
    public function handleBeforeUpdate(BeforeUpdate $event): void
    {
        $this->callModelMethod($event->model, 'onBeforeUpdate', $event);
    }

    /**
     * Handles the AfterUpdate event.
     *
     * @param AfterUpdate $event The event.
     */
    public function handleAfterUpdate(AfterUpdate $event): void
    {
        $this->callModelMethod($event->model, 'onAfterUpdate', $event);
    }


    /**
     * Handles the BeforeDelete event.
     *
     * @param BeforeDelete $event The event.
     */
    public function handleBeforeDelete(BeforeDelete $event): void
    {
        $this->callModelMethod($event->model, 'onBeforeDelete', $event);
    }

    /**
     * Handles the AfterDelete event.
     *
     * @param AfterDelete $event The event.
     */
    public function handleAfterDelete(AfterDelete $event): void
    {
        $this->callModelMethod($event->model, 'onAfterDelete', $event);
    }

    /**
     * Calls a method on the model if it exists.
     *
     * @param object $model The model.
     * @param string $method The method name.
     * @param object $event The event.
     */
    private function callModelMethod(object $model, string $method, object $event): void
    {
        if (method_exists($model, $method)) {
            $model->{$method}($event);
        }
    }

    /**
     * @param array $names
     */
    public function setPropertyNames(array $names): void {}
}
