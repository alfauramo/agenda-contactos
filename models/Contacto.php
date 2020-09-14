<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use DateTime;

/**
 * This is the model class for table "Contacto".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $anno_nacimiento
 *
 * @property Telefonos[] $telefonos
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Contacto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'anno_nacimiento'], 'required'],
            [['anno_nacimiento'], 'safe'],
            [['nombre', 'apellidos'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'anno_nacimiento' => 'Año de nacimiento',
        ];
    }

    /**
     * Gets query for [[Telefonos]].
     *
     * @return \yii\db\ActiveQuery|TelefonosQuery
     */
    public function getTelefonos()
    {
        return $this->hasMany(Telefonos::className(), ['contacto_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ContactoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactoQuery(get_called_class());
    }

    public function beforeSave($insert)
    {

        if (!parent::beforeSave($insert)) return false;

        if ($this->anno_nacimiento !== NULL)
            $this->anno_nacimiento = (new DateTime($this->anno_nacimiento))->format('Y-m-d');

        return true;
    }

    public function afterFind()
    {

        parent::afterFind();

        if (!empty($this->anno_nacimiento)) {
            $this->anno_nacimiento = Yii::$app->formatter->asDateTime($this->anno_nacimiento, 'php:d-m-Y');
        }
    }


    public function getFullName()
    {
        
        return $this->nombre . ' ' . $this->apellidos . ' (' . $this->anno_nacimiento . ')';
    }


    static function toDropDown()
    {
        return  ArrayHelper::map(self::find()->all(), 'id', 'fullName');
    }
}
