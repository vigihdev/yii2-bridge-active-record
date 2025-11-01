# Yii2 Bridge Active Record

Bridge untuk menggunakan Yii Active Record dengan validasi modern.

## Installation

```bash
composer install
```

## Testing

Jalankan test dengan PHPUnit:

```bash
./vendor/bin/phpunit
```

Test khusus untuk TestDb entities:

```bash
./vendor/bin/phpunit tests/Entity/TestDb/
```

## Development Server

Jalankan development server:

```bash
php server.php
```

## Entities

- `User` - Entity untuk tabel user
- `UserProfile` - Entity untuk tabel user_profile dengan relasi ke User

## Features

- Validasi menggunakan Yiisoft Validator
- Event handling untuk ActiveRecord
- Relasi antar entity
- DateTime handling dengan DateTimeImmutable