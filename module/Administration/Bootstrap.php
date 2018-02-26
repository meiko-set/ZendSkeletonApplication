<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Administration;

class Bootstrap
{
  // singelton
  public static function get() {
    if(null===self::$instance) {
      self::$instance=new Bootstrap();
    }
    return self::$instance;
  }
  //----------------------------------------------------------------------------

  public function test()
  {
    $loader = new \Composer\Autoload\ClassLoader();
  }

  // members
  private static $instance;
}
