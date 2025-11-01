<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\Question;

use VigihDev\Yii2Bridge\ActiveRecord\BaseActiveRecord as BaseActiveRecords;

class BaseActiveRecord extends BaseActiveRecords
{
    protected static function getServiceName(): string
    {
        return 'question';
    }
}
