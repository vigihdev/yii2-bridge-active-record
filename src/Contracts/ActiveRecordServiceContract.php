<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Contracts;

use Yiisoft\Db\Connection\ConnectionInterface;

interface ActiveRecordServiceContract
{

    public function db(): ConnectionInterface;
}
