<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProgramApplications Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ApplicationOutcomesTable&\Cake\ORM\Association\BelongsTo $ApplicationOutcomes
 * @property \App\Model\Table\ApplicationStatusTable&\Cake\ORM\Association\BelongsTo $ApplicationStatus
 * @property \App\Model\Table\ProgramsTable&\Cake\ORM\Association\BelongsTo $Programs
 * @property \App\Model\Table\UniversitiesTable&\Cake\ORM\Association\BelongsTo $Universities
 *
 * @method \App\Model\Entity\ProgramApplication get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProgramApplication newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProgramApplication[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProgramApplication|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProgramApplication saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProgramApplication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProgramApplication[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProgramApplication findOrCreate($search, callable $callback = null, $options = [])
 */
class ProgramApplicationsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('program_applications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ApplicationOutcomes', [
            'foreignKey' => 'application_outcome_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ApplicationStatus', [
            'foreignKey' => 'application_status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Programs', [
            'foreignKey' => 'program_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Universities', [
            'foreignKey' => 'university_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmptyString('id', null, 'create');

        $validator
                ->dateTime('created')
                ->allowEmptyDateTime('created');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['application_outcome_id'], 'ApplicationOutcomes'));
        $rules->add($rules->existsIn(['application_status_id'], 'ApplicationStatus'));
        $rules->add($rules->existsIn(['program_id'], 'Programs'));
        $rules->add($rules->existsIn(['university_id'], 'Universities'));

        return $rules;
    }

}
