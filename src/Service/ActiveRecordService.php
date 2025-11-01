<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Service;

use RuntimeException;
use VigihDev\SymfonyBridge\Config\Service\ServiceLocator;
use VigihDev\Yii2Bridge\ActiveRecord\Contracts\ActiveRecordServiceContract;
use VigihDev\Yii2BridgeDb\Contracts\ConnectionServiceContract;
use Yiisoft\ActiveRecord\ActiveRecord;
use Yiisoft\Db\Connection\ConnectionInterface;

abstract class ActiveRecordService extends ActiveRecord implements ActiveRecordServiceContract
{

    abstract protected static function getServiceName(): string;

    public function db(): ConnectionInterface
    {

        if (!ServiceLocator::has(ConnectionServiceContract::class)) {
            throw new RuntimeException("Service " . ConnectionServiceContract::class  . " tidak tersedia");
        }

        /** @var ConnectionServiceContract $connection  */
        $connection = ServiceLocator::get(ConnectionServiceContract::class);
        try {
            return $connection->getConnection(static::getServiceName());
        } catch (\Throwable $e) {
            throw new RuntimeException("Service " . static::getServiceName() . " tidak tersedia");
        }
    }
}
