<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Telefonos]].
 *
 * @see Telefonos
 */
class TelefonosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Telefonos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Telefonos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
