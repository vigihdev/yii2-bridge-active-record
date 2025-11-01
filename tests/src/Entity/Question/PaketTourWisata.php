<?php

declare(strict_types=1);

namespace VigihDev\Yii2Bridge\ActiveRecord\Tests\Entity\Question;

use Yiisoft\Validator\Rule\Required;
use Yiisoft\Validator\Rule\Length;
use Yiisoft\Validator\Rule\Integer;

/**
 * Class PaketTourWisata
 *
 * Represents the `paket_tour_wisata` table for tour package data.
 *
 * @property int $idpaket_tour_wisata The unique identifier
 * @property string $nama The item type (items, title, descriptions)
 * @property int $orders The order sequence
 * @property int|null $parent_id The parent reference
 * @property string $text The content text
 */
class PaketTourWisata extends BaseActiveRecord
{
    #[Required]
    #[Integer]
    public int $idpaket_tour_wisata = 0;

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
        return 'paket_tour_wisata';
    }
}
