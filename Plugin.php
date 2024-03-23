<?php
namespace Diligence;

use MapasCulturais\App;

class Plugin extends \MapasCulturais\Plugin {
   function _init () {
    $app = App::i();
   
    $app->hook('view.render(<<*>>):before', function () use ($app) {
     
    });
   }

   function register () {}
}