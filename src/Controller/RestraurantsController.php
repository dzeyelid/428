<?php
namespace App\Controller;

class RestraurantsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $this->set('data', ['aaa', 'bbb']);
        $this->set('_serialize', 'data');
    }
}