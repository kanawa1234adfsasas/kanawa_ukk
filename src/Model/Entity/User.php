<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $Username
 * @property string $Password
 * @property string $Email
 * @property string $NamaLengkap
 * @property string $Alamat
 */
class User extends Entity
{
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    protected array $_accessible = [
        'Username' => true,
        'Password' => true,
        'Email' => true,
        'NamaLengkap' => true,
        'Alamat' => true,
    ];
    protected array $_hidden = [
    'password',
    ];
}
