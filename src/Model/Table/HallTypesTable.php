<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HallTypes Model
 *
 * @property \App\Model\Table\HallFiltersTable&\Cake\ORM\Association\HasMany $HallFilters
 *
 * @method \App\Model\Entity\HallType newEmptyEntity()
 * @method \App\Model\Entity\HallType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HallType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HallType get($primaryKey, $options = [])
 * @method \App\Model\Entity\HallType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HallType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HallType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HallType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HallType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HallType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HallType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HallType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HallType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HallTypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('hall_types');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->hasMany('HallFilters', [
            'foreignKey' => 'hall_type_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmptyString('type')
            ->add('type', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->isUnique(['type']), ['errorField' => 'type']);

        return $rules;
    }
}
