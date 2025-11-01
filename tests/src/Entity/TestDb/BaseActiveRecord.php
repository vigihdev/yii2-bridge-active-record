<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TestDb;

use VigihDev\Yii2Bridge\ActiveRecord\BaseActiveRecord as BaseActiveRecords;

abstract class BaseActiveRecord extends BaseActiveRecords
{
    protected static function getServiceName(): string
    {
        return 'testDb';
    }
}
