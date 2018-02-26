<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Administration\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function checkAction()
    {
      $extensions=array();
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>curl</strong>',
          'description'=>'',
          'result'=>extension_loaded('curl'),
          'callback'=>null,
          'failclass'=>'danger');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>gd</strong>',
          'description'=>'GD-Bibliothek (Bildinformation und -bearbeitung)',
          'result'=>extension_loaded('gd'),
          'callback'=>array($this, 'onGd'),
          'failclass'=>'warning');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>ldap</strong>',
          'description'=>'',
          'result'=>extension_loaded('ldap'),
          'callback'=>null,
          'failclass'=>'warning');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>mbstring</strong>',
          'description'=>'',
          'result'=>extension_loaded('mbstring'),
          'callback'=>null,
          'failclass'=>'danger');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>sqlsrv</strong>',
          'description'=>'',
          'result'=>extension_loaded('pdo_sqlsrv'),
          'callback'=>null,
          'failclass'=>'warning');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>pdo_sqlsrv</strong>',
          'description'=>'',
          'result'=>extension_loaded('pdo_sqlsrv'),
          'callback'=>null,
          'failclass'=>'warning');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>pdo_mysql</strong>',
          'description'=>'',
          'result'=>extension_loaded('pdo_mysql'),
          'callback'=>null,
          'failclass'=>'warning');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>pdo_sqlite</strong>',
          'description'=>'',
          'result'=>extension_loaded('pdo_sqlite'),
          'callback'=>null,
          'failclass'=>'warning');
      $extensions[]=array(
          'title'=>'PHP Erweiterung <strong>intl</strong>',
          'description'=>'',
          'result'=>extension_loaded('intl'),
          'callback'=>null,
          'failclass'=>'danger');

      $paths=array();
      $paths[]=array(
          'title'=>'Sprach-Ordner vorhanden? <strong>/data/language</strong>',
          'description'=>realpath(dirname(__FILE__).'/../../../../data/language'),
          'result'=>is_dir(dirname(__FILE__).'/../../../../data/language'),
          'callback'=>null,
          'failclass'=>'danger');

      /*
      $translator = $e->getApplication()->getServiceManager()->get('MvcTranslator');
      if($translator instanceof \Zend\Mvc\I18n\Translator)
      {
        var_dump($translator->translate('Help and Support'));
        die;
      }
      */


      $view=new ViewModel();
      $view->extensions=$extensions;
      $view->paths=$paths;
      return $view;
    }
    //--------------------------------------------------------------------------

    // callback
    /*private*/ function onGd()
    {
      $template='gdinfo';
      $view=new ViewModel();
      $view->setTemplate($template);
      $renderer=new PhpRenderer();
      $resolver=new Resolver\AggregateResolver();
      $map=new Resolver\TemplateMapResolver(array(
        'gdinfo'=>dirname(__FILE__). '/../../view/parts/gd.phtml',
      ));
      $resolver->attach($map);
      $renderer->setResolver($resolver);
      $renderer->info=gd_info();
      return $renderer->render($template);
    }
}
