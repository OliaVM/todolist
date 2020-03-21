<?php

class DefaultController extends Controller
{
	public function notFoundAction($request)
	{
		$this->render('404');
	}
}
