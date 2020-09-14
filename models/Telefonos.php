<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Telefonos".
 *
 * @property int $id
 * @property int $prefijo
 * @property string $numero
 * @property int $contacto_id
 *
 * @property Contacto $contacto
 */
class Telefonos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Telefonos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prefijo', 'numero', 'contacto_id'], 'required'],
            [['prefijo', 'contacto_id'], 'integer'],
            [['numero'], 'string', 'max' => 25],
            [['contacto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contacto::className(), 'targetAttribute' => ['contacto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prefijo' => 'Prefijo',
            'numero' => 'Número',
            'contacto_id' => 'Contacto',
        ];
    }

    /**
     * Gets query for [[Contacto]].
     *
     * @return \yii\db\ActiveQuery|ContactoQuery
     */
    public function getContacto()
    {
        return $this->hasOne(Contacto::className(), ['id' => 'contacto_id']);
    }

    /**
     * {@inheritdoc}
     * @return TelefonosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TelefonosQuery(get_called_class());
    }
}
