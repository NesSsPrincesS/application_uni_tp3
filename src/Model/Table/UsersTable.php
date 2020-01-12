<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\ProgramApplicationsTable&\Cake\ORM\Association\HasMany $ProgramApplications
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ProgramApplications', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Programs', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'program_id',
            'joinTable' => 'Program_applications'
        ]);
        $this->belongsToMany('ApplicationOutcomes', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'application_outcome_id',
            'joinTable' => 'Program_applications'
        ]);
        $this->belongsToMany('ApplicationStatus', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'application_status_id',
            'joinTable' => 'Program_applications'
        ]);
        $this->belongsToMany('Programs', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'program_id',
            'joinTable' => 'Program_applications'
        ]);
        $this->belongsToMany('Universities', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'university_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->dateTime('date_of_birth')
            ->allowEmptyDateTime('date_of_birth');

        $validator
            ->dateTime('created')
            ->allowEmptyDateTime('created');

        $validator
            ->allowEmptyString('phone_num');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');
        
        return $validator;
    }
}
