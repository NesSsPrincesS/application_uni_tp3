<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * University Entity
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property string|null $web_site
 *
 * @property \App\Model\Entity\ProgramApplication[] $program_applications
 */
class University extends Entity
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
        'adress' => true,
        'web_site' => true,
        'program_applications' => true
    ];
}
