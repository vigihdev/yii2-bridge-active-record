<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TestDb;

use Yiisoft\Validator\Rule\{Required, Length, Integer, Email, Regex};
use DateTimeImmutable;
use VigihDev\Yii2Bridge\ActiveRecord\Event\ActiveRecordEvent;
use VigihDev\Yii2Bridge\Validator\Rules\{ExistsRecordRule, UniqueRecordRule};
use Yiisoft\ActiveRecord\Event\{AfterUpdate, BeforeDelete, BeforeInsert, BeforeUpdate};

/**
 * Class User
 *
 * Represents the `user` table for user management.
 *
 * @property int $id The unique identifier
 * @property string $username The username
 * @property string $email The email address
 * @property DateTimeImmutable $created_at The creation timestamp
 * @property DateTimeImmutable $updated_at The last update timestamp
 */
#[ActiveRecordEvent]
class User extends BaseActiveRecord
{
    #[Required]
    #[Integer]
    public int $id = 0;

    #[Required]
    #[Length(min: 3, max: 255)]
    #[Regex(pattern: '/^[a-zA-Z0-9_]+$/', message: 'Username hanya boleh mengandung huruf, angka dan underscore')]
    // #[ExistsRecordRule(targetClass: User::class, targetAttribute: 'username', message: 'Username tidak ada.')]
    #[UniqueRecordRule(
        targetClass: User::class,
        targetAttribute: 'username'
    )]
    public string $username = '';

    #[Required]
    #[Email]
    #[Length(min: 5, max: 255)]
    public string $email = '';

    #[Required]
    public ?DateTimeImmutable $created_at = null;

    #[Required]
    public ?DateTimeImmutable $updated_at = null;

    public function tableName(): string
    {
        return 'user';
    }

    public function getValidationPropertyLabels(): array
    {
        return $this->getAttributeLabels();
    }

    public function getAttributeLabels(): array
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
        ];
    }

    public function onBeforeInsert(BeforeInsert $event): void
    {
        // Logika sebelum data disimpan pertama kali
        $this->created_at = new DateTimeImmutable();
        echo "[CUSTOM] User::onBeforeInsert - Set created_at.\n";
    }

    public function onBeforeDelete(BeforeDelete $event): void
    {
        // Logika sebelum data dihapus (misal: cek foreign key)
        echo "[CUSTOM] User::onBeforeDelete - Running safety checks.\n";
        // throw new \Exception('Deletion forbidden'); // Contoh menghentikan operasi
    }

    public function onBeforeUpdate(BeforeUpdate $event)
    {
        echo "[DEFAULT] Before Update From " . $event->model::class . "<br>";
    }

    public function onAfterUpdate(AfterUpdate $event): void
    {
        var_dump($this->username);
        var_dump($event->model->username);
        echo "[DEFAULT] Updated_at set on update.\n";
    }
}
