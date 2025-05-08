<?php

namespace Drupal\kdb_aad_login\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\openid_connect\OpenIDConnectClaims;
use Symfony\Component\HttpFoundation\Response;

/**
 * KDB AAD Login Controller.
 */
class KdbLoginController extends ControllerBase {

    /**
     * OpenID connect client storage.
     */
    protected EntityStorageInterface $clientStorage;

    public function __construct(
        protected OpenIDConnectClaims $claims,
    ) {
        $this->clientStorage = $this->entityTypeManager()->getStorage('openid_connect_client');
    }

    /**
     * Prepares the login request and redirects to the Windows AAD login page.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *   A redirect to the authorization endpoint.git
     */
    public function login(): Response {
        $client_name = 'windows_aad';
        /** @var null|\Drupal\openid_connect\OpenIDConnectClientEntityInterface $client */
        $client = $this->clientStorage->load($client_name);

        if (!$client) {
            throw new \RuntimeException("No {$client_name} openid_connect client");
        }

        $plugin = $client->getPlugin();
        $scopes = $this->claims->getScopes($plugin);

        return $plugin->authorize($scopes);
    }

}
