<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationStatus Model
 *
 * @property \App\Model\Table\ProgramApplicationsTable&\Cake\ORM\Association\HasMany $ProgramApplications
 *
 * @method \App\Model\Entity\ApplicationStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class ApplicationStatusTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('application_status');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->hasMany('ProgramApplications', [
            'foreignKey' => 'application_status_id'
        ]);
        $this->belongsToMany('ApplicationStatus', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'application_status_id',
            'joinTable' => 'Program_applications'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        return $validator;
    }
}
