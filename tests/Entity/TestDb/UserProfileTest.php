<?php

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TestDb;

use VigihDev\Yii2Bridge\ActiveRecord\Tests\TestCase;
use VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TestDb\UserProfile;
use DateTimeImmutable;

class UserProfileTest extends TestCase
{
    public function testUserProfileCreation()
    {
        $profile = new UserProfile();
        $profile->user_id = 1;
        $profile->nama_depan = 'John';
        $profile->nama_lengkap = 'John Doe';
        $profile->no_hp = '081234567890';

        $this->assertEquals(1, $profile->user_id);
        $this->assertEquals('John', $profile->nama_depan);
        $this->assertEquals('John Doe', $profile->nama_lengkap);
        $this->assertEquals('081234567890', $profile->no_hp);
    }

    public function testTableName()
    {
        $profile = new UserProfile();
        $this->assertEquals('user_profile', $profile->tableName());
    }

    public function testAttributeLabels()
    {
        $profile = new UserProfile();
        $labels = $profile->getAttributeLabels();

        $this->assertArrayHasKey('no_hp', $labels);
        $this->assertEquals('No Hp', $labels['no_hp']);
    }

    public function testDateTimeFields()
    {
        /** @var UserProfile $profile  */
        $profile = new UserProfile();
        $birthDate = new DateTimeImmutable('1990-01-01');
        $profile->tgl_lahir = $birthDate;

        $this->assertInstanceOf(DateTimeImmutable::class, $profile->tgl_lahir);
        $this->assertEquals('1990-01-01', $profile->tgl_lahir->format('Y-m-d'));
    }

    public function testFindAll()
    {
        $profiles = UserProfile::query()->all();
        $this->assertCount(UserProfile::query()->count(), $profiles);
        $this->assertInstanceOf(UserProfile::class, $profiles[0]);
    }

    public function testFindAllAsArray()
    {
        $profiles = UserProfile::query()->asArray()->all();
        $this->assertCount(UserProfile::query()->count(), $profiles);
        $this->assertIsArray($profiles);
    }

    public function testUserRelation()
    {
        /** @var UserProfile $profile */
        $profile = UserProfile::query()->one();
        $user = $profile->getUsers();
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(User::query()->one()->username, $user->username);
    }
}
