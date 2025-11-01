<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Contracts;

use Yiisoft\Db\Connection\ConnectionInterface;

/**
 * ActiveRecordServiceContract
 *
 * Defines the contract for a service that provides a database connection.
 */
interface ActiveRecordServiceContract
{
    /**
     * Returns the database connection instance.
     *
     * @return ConnectionInterface The database connection instance.
     */
    public function db(): ConnectionInterface;
}
