<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Perfile Entity
 *
 * @property int $id
 * @property string $perfil
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User[] $users
 */
class Perfile extends Entity
{

}
