<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SelectLanguage extends BaseController
{
     protected $helpers = [];
     

	public function __construct()
	{
        
    }

    public function adminlang()
    {
        $idLang = $this->request->getUri()->getSegment(2);
        $session = session();
        $session->remove('adm_lang');
        $session->set('adm_lang', $idLang);
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function frontlang()
    {
        $idLang = $this->request->getUri()->getSegment(2);
        $session = session();
        $session->remove('web_lang');
        $session->set('web_lang', $idLang);
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
