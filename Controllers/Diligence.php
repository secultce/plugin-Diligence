<?php
namespace Diligence\Controllers;

use DateTime;
use \MapasCulturais\App;
use Diligence\Entities\Diligence as EntityDiligence;
use PhpParser\Node\Stmt\TryCatch;
use Diligence\Repositories\Diligence as DiligenceRepo;

// use MapasCulturais\Entities\EntityRevision as Revision;
// use \MapasCulturais\Entities\EntityRevisionData;
// use MapasCulturais\Traits;
// use Recourse\Entities\Recourse as EntityRecourse;


class Diligence extends \MapasCulturais\Controller{

    public function POST_save()
    {
        $app = App::i();  
        $reg = $app->repo('Registration')->find($this->data['registration']);
        $openAgent = $app->repo('Agent')->find($this->data['openAgent']);
        $agent = $app->repo('Agent')->find($this->data['agent']);
       
        $diligence = new EntityDiligence;
        $diligence->registration    = $reg;
        $diligence->openAgent       = $openAgent;
        $diligence->agent           = $agent;
        $diligence->createTimestamp =  new DateTime();
        $diligence->description     = $this->data['description'];
        $diligence->status          = 0;     
    
        $userDestination = ['username' => $agent->name, 'email' => $agent->user->email ];
        $app->em->persist($diligence);
        $app->em->flush();
        $app->disableAccessControl();
        $save = $diligence->save(true);
        $app->enableAccessControl();
        // EntityDiligence::sendQueue($userDestination);

        if(is_null($save)){
            // EntityDiligence::sendQueue($userDestination);
            $this->json(['message' => 'success', 'status' => 200], 200);
        }else{
            $this->json(['message' => 'Error: ', 'status' => 400], 400);
        }      
      
    }

    /**
     * Busca o conteúdo de uma diligencia salva ou enviada
     *
     * @return void
     */
    public function GET_getcontent() {
        
        if(isset($this->data['id'])){
            //Repositorio da Diligencia
            $diligence = DiligenceRepo::findBy($this->data['id']);
            $this->json(['message' =>$diligence[0]->description, 'status' => 200], 200);
        }
        //Validação caso nao tenha a inscrição na URL
        $this->json(['message' => 'Falta a inscrição', 'status' => 'error'], 400);
    }
}