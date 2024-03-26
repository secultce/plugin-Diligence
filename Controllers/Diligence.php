<?php
namespace Diligence\Controllers;

use DateTime;
use \MapasCulturais\App;
use Diligence\Entities\Diligence as EntityDiligence;
// use MapasCulturais\Entities\EntityRevision as Revision;
// use \MapasCulturais\Entities\EntityRevisionData;
// use MapasCulturais\Traits;
// use Recourse\Entities\Recourse as EntityRecourse;


class Diligence extends \MapasCulturais\Controller{

    public function GET_index()
    {

        $app = App::i();  
        dump($app);
        $diligence = new EntityDiligence;
        $diligence->description = 482221406;
        dump($diligence->description);
        dump($diligence->days);
    }
}