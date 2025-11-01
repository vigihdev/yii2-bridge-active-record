<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TestDb;

use DateTimeImmutable;
use Yiisoft\ActiveRecord\ActiveQueryInterface;
use Yiisoft\Validator\Rule\{Required, Length, Integer, Number, StringValue};
use Yiisoft\Validator\LabelsProviderInterface;

/**
 * Class UserProfile
 *
 * Represents the `user_profile` table for user profile information.
 *
 * @property int $iduser_profile The unique identifier
 * @property int $user_id The user reference
 * @property string|null $nama_depan First name
 * @property string|null $nama_lengkap Full name
 * @property string|null $tgl_lahir Birth date
 * @property string|null $no_hp Phone number
 * @property string|null $alamat Address
 * @property string|null $kode_pos Postal code
 * @property string|null $propinsi Province
 * @property string|null $kota City
 * @property string|null $hobi Hobbies
 * @property string|null $foto_profile Profile photo
 */
class UserProfile extends BaseActiveRecord implements LabelsProviderInterface
{
    #[Required]
    #[Integer]
    public int $iduser_profile = 0;

    #[Required]
    #[Integer]
    public int $user_id = 0;

    #[Length(max: 50)]
    public ?string $nama_depan = null;

    public ?string $nama_lengkap = null;

    public ?DateTimeImmutable $tgl_lahir = null;

    #[Number(min: 8, max: 15, skipOnEmpty: true)]
    public ?string $no_hp = null;

    #[Length(max: 225, skipOnEmpty: true)]
    public ?string $alamat = null;

    #[Length(min: 4, max: 15, skipOnEmpty: true)]
    public ?string $kode_pos = null;

    #[Length(min: 5, max: 100, skipOnEmpty: true)]
    public ?string $propinsi = null;

    #[Length(max: 100, skipOnEmpty: true)]
    public ?string $kota = null;

    #[Length(max: 255, skipOnEmpty: true)]
    public ?string $hobi = null;

    #[Length(max: 255, skipOnEmpty: true)]
    public ?string $foto_profile = null;

    public function tableName(): string
    {
        return 'user_profile';
    }

    public function getValidationPropertyLabels(): array
    {
        return $this->getAttributeLabels();
    }

    public function getAttributeLabels(): array
    {
        return [
            'no_hp' => 'No Hp'
        ];
    }

    public function relationQuery(string $name): ActiveQueryInterface
    {
        return match ($name) {
            'users' => $this->hasOne(User::class, ['id' => 'user_id']),
            default => parent::relationQuery($name),
        };
    }

    public function getUsers(): User
    {
        return $this->relation('users');
    }
}
