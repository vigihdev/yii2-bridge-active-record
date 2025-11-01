<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Service;

use RuntimeException;
use VigihDev\SymfonyBridge\Config\Service\ServiceLocator;
use VigihDev\Yii2Bridge\ActiveRecord\Contracts\ActiveRecordServiceContract;
use VigihDev\Yii2BridgeDb\Contracts\ConnectionServiceContract;
use Yiisoft\ActiveRecord\ActiveRecord;
use Yiisoft\Db\Connection\ConnectionInterface;

/**
 * ActiveRecordService
 *
 * Provides a base class for ActiveRecord models that use a service locator to get a database connection.
 */
abstract class ActiveRecordService extends ActiveRecord implements ActiveRecordServiceContract
{
    /**
     * Returns the name of the service to use for the database connection.
     *
     * @return string The name of the service.
     */
    abstract protected static function getServiceName(): string;

    /**
     * Returns the database connection instance.
     *
     * @return ConnectionInterface The database connection instance.
     * @throws RuntimeException If the connection service or the specified service is not available.
     */
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
