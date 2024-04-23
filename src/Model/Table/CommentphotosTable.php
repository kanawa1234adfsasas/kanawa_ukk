<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commentphotos Model
 *
 * @property \App\Model\Table\PhotosTable&\Cake\ORM\Association\BelongsTo $Photos
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Commentphoto newEmptyEntity()
 * @method \App\Model\Entity\Commentphoto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Commentphoto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commentphoto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Commentphoto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Commentphoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Commentphoto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commentphoto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Commentphoto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Commentphoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commentphoto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Commentphoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commentphoto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Commentphoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commentphoto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Commentphoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Commentphoto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CommentphotosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('commentphotos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Photos', [
            'foreignKey' => 'Photos_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'Users_id',
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
            ->scalar('IsiKomentar')
            ->requirePresence('IsiKomentar', 'create')
            ->notEmptyString('IsiKomentar');

        $validator
            ->date('TanggalKomentar')
            ->requirePresence('TanggalKomentar', 'create')
            ->notEmptyDate('TanggalKomentar');

        $validator
            ->integer('Photos_id')
            ->notEmptyString('Photos_id');

        $validator
            ->integer('Users_id')
            ->notEmptyString('Users_id');

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
        $rules->add($rules->existsIn(['Photos_id'], 'Photos'), ['errorField' => 'Photos_id']);
        $rules->add($rules->existsIn(['Users_id'], 'Users'), ['errorField' => 'Users_id']);

        return $rules;
    }
}
