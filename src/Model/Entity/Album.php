<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Album Entity
 *
 * @property int $id
 * @property string $NamaAlbum
 * @property string $Deskripsi
 * @property \Cake\I18n\Date $TanggalDibuat
 * @property int $Users_id
 *
 * @property \App\Model\Entity\User $user
 */
class Album extends Entity
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
        'NamaAlbum' => true,
        'Deskripsi' => true,
        'TanggalDibuat' => true,
        'Users_id' => true,
        'user' => true,
    ];
}
