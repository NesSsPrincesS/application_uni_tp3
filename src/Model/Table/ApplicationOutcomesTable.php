<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationOutcomes Model
 *
 * @property \App\Model\Table\ProgramApplicationsTable&\Cake\ORM\Association\HasMany $ProgramApplications
 *
 * @method \App\Model\Entity\ApplicationOutcome get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationOutcome newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplicationOutcome[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationOutcome|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationOutcome saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationOutcome patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationOutcome[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationOutcome findOrCreate($search, callable $callback = null, $options = [])
 */
class ApplicationOutcomesTable extends Table
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

        $this->setTable('application_outcomes');
        $this->setDisplayField('outcome');
        $this->setPrimaryKey('id');

        $this->hasMany('ProgramApplications', [
            'foreignKey' => 'application_outcome_id'
        ]);
        $this->belongsToMany('ApplicationOutcomes', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'application_outcome_id',
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
            ->scalar('outcome')
            ->allowEmptyString('outcome');

        return $validator;
    }
}
