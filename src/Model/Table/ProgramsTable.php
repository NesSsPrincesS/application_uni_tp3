<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Programs Model
 *
 * @property \App\Model\Table\ProgramApplicationsTable&\Cake\ORM\Association\HasMany $ProgramApplications
 *
 * @method \App\Model\Entity\Program get($primaryKey, $options = [])
 * @method \App\Model\Entity\Program newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Program[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Program|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Program saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Program patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Program[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Program findOrCreate($search, callable $callback = null, $options = [])
 */
class ProgramsTable extends Table
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

        $this->setTable('programs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ProgramApplications', [
            'foreignKey' => 'program_id'
        ]);
        $this->belongsToMany('Programs', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'program_id',
            'joinTable' => 'Program_applications'
        ]);
        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id'
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
            ->notEmptyString('name');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 16777215)
            ->allowEmptyString('Description');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));

        return $rules;
    }
}
