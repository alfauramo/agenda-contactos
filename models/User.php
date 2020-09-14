<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $nombre
 * @property string $token
 */
class User extends ActiveRecord implements IdentityInterface
{

    public $authKey;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'token'], 'required'],
            [['email'], 'string', 'max' => 155],
            [['password', 'nombre'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 45],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'nombre' => 'Nombre',
            'token' => 'Token',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * Este findByUsername fue modificado para:
     * 1º - Para que en lugar de buscar por username sea por email
     * 2º - Para comprobar si el usuario está activo o no.
     */
    public static function findByUsername($email)
    {
        $users = self::find()->all();
        foreach ($users as $user) {
            if (strcasecmp($user->email, $email) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return (Yii::$app->getSecurity()->validatePassword($password, $this->password));
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::find()->all() as $user) {
            if ($user['token'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord)
                $this->token = (new Security)->generateRandomString(24);
            if ($this->isNewRecord || $this->isAttributeChanged('password')) {
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }

            return true;
        }
        return false;
    }
}
