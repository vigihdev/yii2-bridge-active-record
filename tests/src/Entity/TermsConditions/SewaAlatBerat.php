<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\TermsConditions;

use Yiisoft\Validator\Rule\Required;
use Yiisoft\Validator\Rule\Length;
use Yiisoft\Validator\Rule\Integer;

/**
 * Class SewaAlatBerat
 *
 * Represents the `sewa_alat_berat` table for heavy equipment rental terms.
 *
 * @property int $idsewa_alat_berat The unique identifier
 * @property string $nama The item type (items, title, descriptions)
 * @property int $orders The order sequence
 * @property int|null $parent_id The parent reference
 * @property string $text The content text
 */
class SewaAlatBerat extends BaseActiveRecord
{
    #[Required]
    #[Integer]
    public int $idsewa_alat_berat = 0;

    #[Required]
    #[Length(min: 1, max: 50)]
    public string $nama = '';

    #[Required]
    #[Integer]
    public int $orders = 0;

    #[Integer]
    public ?int $parent_id = null;

    #[Required]
    #[Length(min: 1)]
    public string $text = '';

    public function tableName(): string
    {
        return 'sewa_alat_berat';
    }
}
