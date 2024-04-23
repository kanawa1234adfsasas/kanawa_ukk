<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Photo Entity
 *
 * @property int $id
 * @property string $JudulFoto
 * @property string $DeskripsiFoto
 * @property \Cake\I18n\Date $TanggalUnggah
 * @property string $LokasiFile
 * @property string $foto
 * @property int $Albums_id
 * @property int $Users_id
 *
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\User $user
 */
class Photo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'JudulFoto' => true,
        'DeskripsiFoto' => true,
        'TanggalUnggah' => true,
        'LokasiFile' => true,
        'foto' => true,
        'Albums_id' => true,
        'Users_id' => true,
        'album' => true,
        'user' => true,
    ];
}
