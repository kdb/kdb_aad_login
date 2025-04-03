<?php

namespace Drupal\kdb_aad_login\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
   * @inheritDoc
   */
  protected function alterRoutes(RouteCollection $collection): void {
    if ($route = $collection->get('user.login')) {
      $route->setPath('/login-with-ad');
    }
  }

}
