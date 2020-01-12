<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProgramApplication Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $application_outcome_id
 * @property int $application_status_id
 * @property int $program_id
 * @property int $university_id
 * @property \Cake\I18n\FrozenTime|null $date_of_application
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ApplicationOutcome $application_outcome
 * @property \App\Model\Entity\ApplicationStatus $application_status
 * @property \App\Model\Entity\Program $program
 * @property \App\Model\Entity\University $university
 */
class ProgramApplication extends Entity
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
        'user_id' => true,
        'application_outcome_id' => true,
        'application_status_id' => true,
        'program_id' => true,
        'university_id' => true,
        'date_of_application' => true,
        'user' => true,
        'application_outcome' => true,
        'application_status' => true,
        'program' => true,
        'university' => true
    ];
}
