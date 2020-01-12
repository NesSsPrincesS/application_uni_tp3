<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property \Cake\I18n\FrozenTime|null $date_of_birth
 * @property \Cake\I18n\FrozenTime|null $date_of_registration
 * @property int|null $phone_num
 *
 * @property \App\Model\Entity\ProgramApplication[] $program_applications
 */
class User extends Entity
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
        'gender' => true,
        'date_of_birth' => true,
        'created' => true,
        'phone_num' => true,
        'program_applications' => true,
        'password' => true
    ];
     protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }

}
