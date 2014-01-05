<?php

class CodeFormModel extends CFormModel {

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
            } elseif ($codeRecord->sign_dateline != 0) {
                $time = date("Y-m-d H:i:s", $codeRecord->sign_dateline);
                $this->addError('code', '验证码' . $code . '已经被' . $codeRecord->uid . '于' . $time . '使用!');
            }
        }
    }

    public function getInfo() {
        $code = $this->code;
        $codeRecord = Apply::model()->findByAttributes(array('code' => $code, 'sign_dateline' => 0));
        return $codeRecord;
    }

}
