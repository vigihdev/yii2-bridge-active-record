<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord;

use VigihDev\Yii2Bridge\ActiveRecord\Event\ActiveRecordEvent;
use VigihDev\Yii2Bridge\ActiveRecord\Service\ActiveRecordService;
use Yiisoft\ActiveRecord\Event\{AfterDelete, AfterInsert, AfterUpdate, BeforeUpdate};
use Yiisoft\ActiveRecord\Event\EventDispatcherProvider;

#[ActiveRecordEvent()]
abstract class BaseActiveRecord extends ActiveRecordService
{


    public function save(?array $properties = null): void
    {
        $isNew = $this->isNew();
        parent::save($properties);
        $dispatcher = EventDispatcherProvider::get(static::class);
        $dispatcher->dispatch($isNew ? new AfterInsert($this, true) : new AfterUpdate($this, 1));
    }

    public function delete(): int
    {
        $result = parent::delete();
        $dispatcher = EventDispatcherProvider::get(static::class);
        $dispatcher->dispatch(new AfterDelete($this, $result));
        return $result;
    }

    public function update(?array $properties = null): int
    {
        $dispatcher = EventDispatcherProvider::get(static::class);
        $dispatcher->dispatch(new BeforeUpdate($this, $properties));
        $result = parent::update($properties);
        $dispatcher->dispatch(new AfterUpdate($this, $result));
        return $result;
    }
}
