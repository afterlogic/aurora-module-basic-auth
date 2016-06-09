<?php

/* -AFTERLOGIC LICENSE HEADER- */

/**
 *
 * @package Users
 * @subpackage Classes
 */
class CAccount extends APropertyBag
{
	/**
	 * Creates a new instance of the object.
	 * 
	 * @return void
	 */
	public function __construct($sModule, $oParams)
	{
		parent::__construct(get_class($this), $sModule);
		
		$this->__USE_TRIM_IN_STRINGS__ = true;
		
		$this->aStaticMap = array(
			'IsDisabled'	=> array('bool', false),
			'IdUser'		=> array('int', 0),
			'Login'			=> array('string', ''),
			'Password'		=> array('encrypted', ''),
			'LastModified'  => array('datetime', date('Y-m-d H:i:s'))
		);
		
		$this->SetDefaults();

		CApi::Plugin()->RunHook('api-account-construct', array(&$this));
	}
	
	/**
	 * Checks if the user has only valid data.
	 * 
	 * @return bool
	 */
	public function isValid()
	{
		switch (true)
		{
			case false:
				throw new CApiValidationException(Errs::Validation_FieldIsEmpty, null, array(
					'{{ClassName}}' => 'CUser', '{{ClassField}}' => 'Error'));
		}

		return true;
	}
	
	public static function createInstance($sModule = 'Auth', $oParams = array())
	{
		return new CAccount($sModule, $oParams);
	}
}
