<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Restaurant Entity
 *
 * @property int $id
 * @property string $name
 * @property int $credit_card_id
 * @property bool $halal
 * @property bool $vegan
 * @property bool $gluten_free
 *
 * @property \App\Model\Entity\CreditCard $credit_card
 */
class Restaurant extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'credit_card_id' => true,
        'halal' => true,
        'vegan' => true,
        'gluten_free' => true,
        'credit_card' => true
    ];
}
