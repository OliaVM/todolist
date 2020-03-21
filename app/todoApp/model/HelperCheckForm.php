<?php
class HelperCheckForm {
	/*
	 * @param string $fieldFromForm
	 * @return string
	 */ 
	public static function checkField($fieldFromForm) 
	{
		if (preg_match("/[a-zA-Z0-9а-яА-Я]{3,20}/", $fieldFromForm) !== 1 || preg_match("/[a-zA-Z0-9а-яА-Я]{3,20}/", $fieldFromForm) == false) {
			return 'Вы можете использовать только буквы и цифры. Число символов должно быть не меньше 3 и не больше 20';
		}
	}
}