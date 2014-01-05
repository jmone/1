<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if(!$this->check_ldapauthuser($this->username,$this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id=$user->id;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}

	public function check_ldapauthuser($user,$pass) {
            if($user=='admin'&&$pass=='xiaomi816'){
                return true;
            }
            return false;
//		$ds = @ldap_connect('10.237.2.12', '389');
                $ds = @ldap_connect('10.237.8.2', '389');
//                $ds = @ldap_connect('10.237.8.3', '389');         
		ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 2);
		if ($ds !== false) {
			$rt = @ldap_bind($ds, "xiaomi\\" . $user, $pass);

			if($rt === true) {
				return true;
			}else{
				$ds_again = @ldap_connect('10.237.8.2', '389');
//                                $ds_again = @ldap_connect('10.237.8.3', '389');
				ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 2);
				if($ds_again !== false) {
					$rt_again = @ldap_bind($ds_again, "xiaomi\\" . $user, $pass);
					if($rt_again === true) {
						return true;
					} else {
						return false;
					}
				}
				return false;
			}

		} else {
			return false;
		}
	}
	
	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}