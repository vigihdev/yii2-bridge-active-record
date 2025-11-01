<?php

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TestDb;

use VigihDev\Yii2Bridge\ActiveRecord\Tests\TestCase;
use VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TestDb\User;
use DateTimeImmutable;

class UserTest extends TestCase
{
    public function testUserCreation()
    {
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'test@example.com';
        $user->created_at = new DateTimeImmutable();
        $user->updated_at = new DateTimeImmutable();

        $this->assertEquals('testuser', $user->username);
        $this->assertEquals('test@example.com', $user->email);
        $this->assertInstanceOf(DateTimeImmutable::class, $user->created_at);
    }

    public function testTableName()
    {
        $user = new User();
        $this->assertEquals('user', $user->tableName());
    }

    public function testAttributeLabels()
    {
        $user = new User();
        $labels = $user->getAttributeLabels();
        
        $this->assertArrayHasKey('username', $labels);
        $this->assertArrayHasKey('email', $labels);
        $this->assertEquals('Username', $labels['username']);
        $this->assertEquals('Email', $labels['email']);
    }
}
