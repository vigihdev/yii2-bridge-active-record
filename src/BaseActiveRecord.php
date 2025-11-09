<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord;

use VigihDev\Yii2Bridge\ActiveRecord\Event\ActiveRecordEvent;
use VigihDev\Yii2Bridge\ActiveRecord\Service\ActiveRecordService;
use Yiisoft\ActiveRecord\Event\{AfterDelete, AfterInsert, AfterUpdate, BeforeDelete, BeforeInsert, BeforeUpdate};
use Yiisoft\ActiveRecord\Event\EventDispatcherProvider;

/**
 * BaseActiveRecord
 *
 * Provides a base class for ActiveRecord models with event dispatching capabilities.
 */
#[ActiveRecordEvent()]
abstract class BaseActiveRecord extends ActiveRecordService
{
    /**
     * Saves the current record.
     *
     * This method will dispatch an `AfterInsert` event if the record is new,
     * or an `AfterUpdate` event if the record already exists.
     *
     * @param array|null $properties The properties to save. If null, all properties will be saved.
     */
    public function save(?array $properties = null): void
    {
        $dispatcher = EventDispatcherProvider::get(static::class);
        $isNew = $this->isNew();
        if ($isNew) {
            $dispatcher->dispatch(new BeforeInsert($this, $properties));
        }
        parent::save($properties);
        $dispatcher->dispatch($isNew ? new AfterInsert($this, true) : new AfterUpdate($this, 1));
    }

    /**
     * Deletes the current record.
     *
     * This method will dispatch an `AfterDelete` event after the record is deleted.
     *
     * @return int The number of rows deleted.
     */
    public function delete(): int
    {
        $dispatcher = EventDispatcherProvider::get(static::class);
        $dispatcher->dispatch(new BeforeDelete($this));
        $result = parent::delete();
        $dispatcher->dispatch(new AfterDelete($this, $result));
        return $result;
    }

    /**
     * Updates the current record.
     *
     * This method will dispatch a `BeforeUpdate` event before the record is updated,
     * and an `AfterUpdate` event after the record is updated.
     *
     * @param array|null $properties The properties to update. If null, all properties will be updated.
     * @return int The number of rows updated.
     */
    public function update(?array $properties = null): int
    {
        $dispatcher = EventDispatcherProvider::get(static::class);
        $dispatcher->dispatch(new BeforeUpdate($this, $properties));
        $result = parent::update($properties);
        $dispatcher->dispatch(new AfterUpdate($this, $result));
        return $result;
    }
}
