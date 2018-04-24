<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $brand_id
 * @property int $feature_id
 * @property string $name
 * @property string $images
 * @property string $price
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\Feature $feature
 */
class Product extends Entity
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
        'category_id' => true,
        'brand_id' => true,
        'feature_id' => true,
        'name' => true,
        'images' => true,
        'vendor' => true,
        'price' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'brand' => true,
        'feature' => true
    ];
}
