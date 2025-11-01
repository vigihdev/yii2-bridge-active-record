# Yii2 Bridge Active Record

[![Latest Stable Version](https://img.shields.io/packagist/v/vigihdev/yii2-bridge-active-record.svg?style=flat-square)](https://packagist.org/packages/vigihdev/yii2-bridge-active-record)
[![Total Downloads](https://img.shields.io/packagist/dt/vigihdev/yii2-bridge-active-record.svg?style=flat-square)](https://packagist.org/packages/vigihdev/yii2-bridge-active-record)
[![License](https://img.shields.io/packagist/l/vigihdev/yii2-bridge-active-record.svg?style=flat-square)](https://packagist.org/packages/vigihdev/yii2-bridge-active-record)
[![Build Status](https://img.shields.io/github/actions/workflow/status/vigihdev/yii2-bridge-active-record/push.yml?branch=main&style=flat-square)](https://github.com/vigihdev/yii2-bridge-active-record/actions)

Enhanced Active Record bridge for modern PHP applications, integrating a powerful service container, advanced validation, caching, and multilingual support. This library provides a flexible and robust ORM layer, designed to be easily integrated into any project requiring a solid data persistence solution.

## Features

- **Service Container Integration**: Decouples database connections, making your models more portable and testable.
- **Modern Validation**: Leverages `yiisoft/validator` for powerful and flexible validation rules (via `vigihdev/yii2-bridge-validator`).
- **Event-Driven Architecture**: Dispatch events on `AfterInsert`, `AfterUpdate`, and `AfterDelete` to hook into the model lifecycle.
- **Seamless Relations**: Easily define and query relationships between your entities.
- **Modern Data Types**: Automatic handling of `DateTimeImmutable` for date/time fields.

## Installation

Install the package via [Composer](https://getcomposer.org/):

```bash
composer require vigihdev/yii2-bridge-active-record
```

## Basic Usage

First, ensure your service container is configured to provide database connections. This library relies on `vigihdev/yii2-bridge-db` for connection management.

### 1. Create a Base Model

Create your own base model that extends `VigihDev\Yii2Bridge\ActiveRecord\BaseActiveRecord` and specifies the database service name.

```php
<?php

namespace App\Models;

use VigihDev\Yii2Bridge\ActiveRecord\BaseActiveRecord;

abstract class YourBaseModel extends BaseActiveRecord
{
    protected static function getServiceName(): string
    {
        // The name of the database connection service configured in your container
        return 'db'; 
    }
}
```

### 2. Define an Entity

Create an entity class that represents a database table.

```php
<?php

namespace App\Models;

use Yiisoft\ActiveRecord\ActiveQuery;

/**
 * @property int $id
 * @property string $username
 * @property string $email
 *
 * @property UserProfile $profile
 */
class User extends YourBaseModel
{
    public function tableName(): string
    {
        return '{{%user}}';
    }

    public function getProfile(): ActiveQuery
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }
}
```

### 3. Querying Data

You can now use the powerful query builder to fetch data.

```php
// Find all users
$users = User::query()->all();

// Find a single user by primary key
$user = User::query()->where(['id' => 1])->one();

// Eager load relations
$usersWithProfiles = User::query()->with('profile')->all();

// Access related data
$username = $usersWithProfiles[0]->profile->full_name;
```

## Testing

To run the test suite, use the following command:

```bash
./vendor/bin/phpunit
```

## License

This project is licensed under the MIT License. See the [LICENSE.md](license.md) file for details.
