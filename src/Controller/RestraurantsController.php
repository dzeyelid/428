<?php
namespace App\Controller;

class RestraurantsController extends AppController
{
    public function index()
    {
        $this->set('_serialize', array('aaa', 'bbb'));
    }
}