<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Photos Model
 *
 * @property \App\Model\Table\AlbumsTable&\Cake\ORM\Association\BelongsTo $Albums
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Photo newEmptyEntity()
 * @method \App\Model\Entity\Photo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Photo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Photo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Photo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Photo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Photo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Photo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Photo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Photo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Photo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PhotosTable extends Table
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

        $this->setTable('photos');
        $this->setDisplayField('JudulFoto');
        $this->setPrimaryKey('id');

        $this->belongsTo('Albums', [
            'foreignKey' => 'Albums_id',
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
            ->scalar('JudulFoto')
            ->maxLength('JudulFoto', 255)
            ->requirePresence('JudulFoto', 'create')
            ->notEmptyString('JudulFoto');

        $validator
            ->scalar('DeskripsiFoto')
            ->requirePresence('DeskripsiFoto', 'create')
            ->notEmptyString('DeskripsiFoto');

        $validator
            ->date('TanggalUnggah')
            ->requirePresence('TanggalUnggah', 'create')
            ->notEmptyDate('TanggalUnggah');

        $validator
            ->scalar('LokasiFile')
            ->maxLength('LokasiFile', 255)
            ->requirePresence('LokasiFile', 'create')
            ->notEmptyString('LokasiFile');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 255)
            ->requirePresence('foto', 'create')
            ->notEmptyString('foto');

        $validator
            ->integer('Albums_id')
            ->notEmptyString('Albums_id');

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
        $rules->add($rules->existsIn(['Albums_id'], 'Albums'), ['errorField' => 'Albums_id']);
        $rules->add($rules->existsIn(['Users_id'], 'Users'), ['errorField' => 'Users_id']);

        return $rules;
    }
}
