<?php

class Code2FormModel extends CFormModel {

    public $code;

    public function rules() {
        return array(
            array('code', 'required'),
            array('code', 'check'),
        );
    }

    public function attributeLabels() {
        return array(
            'code' => '验证码',
        );
    }

    public function check($attribute, $params) {
        if (!$this->hasErrors()) {
            $code = $this->code;
            $codeRecord = Apply::model()->findByAttributes(array('code' => $code));
            if (!$codeRecord) {
                $this->addError('code', '验证码不存在!');
            } elseif ($codeRecord->sign_off_dateline != 0) {
                $time = date("Y-m-d H:i:s", $codeRecord->sign_off_dateline);
                $this->addError('code', '验证码' . $code . '已经被' . $codeRecord->uid . '于' . $time . '签退!');
            }
        }
    }

    public function getInfo() {
        $code = $this->code;
        $codeRecord = Apply::model()->findByAttributes(array('code' => $code, 'sign_off_dateline' => 0));
        return $codeRecord;
    }

}
