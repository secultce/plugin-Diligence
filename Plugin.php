<?php
namespace Diligence;

use MapasCulturais\App;

class Plugin extends \MapasCulturais\Plugin {
   function _init () {
    $app = App::i();
   
    $app->hook('template(registration.view.content-diligence):begin', function () use ($app) {
      $app->view->enqueueStyle('app', 'diligence', 'css/diligence/style.css');
      
     $this->part('diligence/tabs-parent');
    });
   }

   function register () {
      $app = App::i();
      $app->registerController('diligence', Controllers\Diligence::class);
   }
}