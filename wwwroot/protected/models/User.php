<?php

class User extends CActiveRecord {
    /**
     * The followings are the available columns in table 'tbl_user':
     * @var integer $id
     * @var string $username
     * @var string $password
     * @var string $salt
     * @var string $email
     * @var string $profile
     */

    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username', 'required'),
            array('username', 'unique'),
            array('username, email', 'length', 'max' => 128),
            array('profile', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => '#',
            'username' => '用户名',
            //'password' => '密码',
            //'salt' => 'Salt',
            'email' => 'Email',
            'profile' => '用户简介',
        );
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    // public function validatePassword($password) {
    //     return $this->hashPassword($password, $this->salt) === $this->password;
    // }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    // public function hashPassword($password, $salt) {
    //     return md5($salt . $password);
    // }

    /**
     * Generates a salt that can be used to generate a password hash.
     * @return string the salt
     */
    // protected function generateSalt() {
    //     return uniqid('', true);
    // }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        //$criteria->compare('password', $this->password, true);
        //$criteria->compare('salt', $this->salt);
        $criteria->compare('email', $this->email);
        $criteria->compare('profile', $this->profile, true);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function searchByUids($uids = array()) {

        if (empty($uids)) {
            return false;
        }
        $data = array();
        $query = Yii::app()->db->createCommand()
                ->select('id, username')
                ->from($this->tableName())
                ->where('id IN (:id)', array(':id' => implode(',', $uids)))
                ->query();
        while ($row = $query->read()) {
            $data[$row['id']] = $row['username'];
        }

        return $data;
    }

}
