<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Contracts;

use Yiisoft\Validator\LabelsProviderInterface;

/**
 * Provides data property labels.
 */
interface AttributeLabelsContract extends LabelsProviderInterface
{
    /**
     * @return array<string, string> A set of property labels.
     */
    public function getAttributeLabels(): array;
}
