<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Universities Model
 *
 * @property \App\Model\Table\ProgramApplicationsTable&\Cake\ORM\Association\HasMany $ProgramApplications
 *
 * @method \App\Model\Entity\University get($primaryKey, $options = [])
 * @method \App\Model\Entity\University newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\University[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\University|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\University saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\University patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\University[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\University findOrCreate($search, callable $callback = null, $options = [])
 */
class UniversitiesTable extends Table
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

        $this->setTable('universities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ProgramApplications', [
            'foreignKey' => 'university_id'
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
            ->scalar('adress')
            ->maxLength('adress', 255)
            ->requirePresence('adress', 'create')
            ->notEmptyString('adress');

        $validator
            ->scalar('web_site')
            ->maxLength('web_site', 255)
            ->allowEmptyString('web_site');

        return $validator;
    }
}
