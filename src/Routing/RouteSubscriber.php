<?php

namespace Drupal\kdb_aad_login\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Routes subscriber for the KDB AAD Login module.
 */
class RouteSubscriber extends RouteSubscriberBase {

    /**
     * {@inheritDoc}
     */
    protected function alterRoutes(RouteCollection $collection): void {
        if ($route = $collection->get('user.login')) {
            $route->setDefault('_controller', 'Drupal\kdb_aad_login\Controller\KdbLoginController::login');
        }
    }

}
