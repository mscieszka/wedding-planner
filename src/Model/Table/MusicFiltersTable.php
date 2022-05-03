<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MusicFilters Model
 *
 * @property \App\Model\Table\OffersTable&\Cake\ORM\Association\BelongsTo $Offers
 *
 * @method \App\Model\Entity\MusicFilter newEmptyEntity()
 * @method \App\Model\Entity\MusicFilter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MusicFilter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MusicFilter get($primaryKey, $options = [])
 * @method \App\Model\Entity\MusicFilter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MusicFilter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MusicFilter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MusicFilter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MusicFilter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MusicFilter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MusicFilter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MusicFilter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MusicFilter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MusicFiltersTable extends Table
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

        $this->setTable('music_filters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Offers', [
            'foreignKey' => 'offer_id',
            'joinType' => 'INNER',
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
            ->boolean('disco_polo')
            ->allowEmptyString('disco_polo');

        $validator
            ->boolean('pop')
            ->allowEmptyString('pop');

        $validator
            ->boolean('rock')
            ->allowEmptyString('rock');

        $validator
            ->boolean('oldies')
            ->allowEmptyString('oldies');

        $validator
            ->boolean('world_music')
            ->allowEmptyString('world_music');

        $validator
            ->boolean('running_games')
            ->allowEmptyString('running_games');

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
        $rules->add($rules->existsIn('offer_id', 'Offers'), ['errorField' => 'offer_id']);

        return $rules;
    }
}
