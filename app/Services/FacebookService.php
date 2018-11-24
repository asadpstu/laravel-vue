<?php
namespace App\Services;

class FacebookService
{
    public function getRab()
    {
      return "Bangldesh Rab Facebook Page";
    }

    public function getPolice()
    {
      return "Bangldesh Police Facebook Page";
    }

    public function getNavy()
    {
      return "Bangldesh Navy Facebook Page";
    }

    public function getDoctor()
    {
      return "Bangldesh Doctor Association Facebook Page";
    }

    public function getEngineer()
    {
      return "Bangldesh Engineer Association Facebook Page";
    }

    public function getAll()
    {
    	return ([
    		'Rab' => ['Rapid Action Batellion','http://rab.net','Dangerous'],
    		'Pol' => ['Police','http://bp.net','Batpar'],
    		'Navy' => ['Bangladesh Navy','http://ban.net','Awosome'],
    		'Doc' => ['Doctor','http://bda.net','Good'],
    		'Engg' => ['Engineer','http://bei.net','Excellent'],
    	]);
    }

}