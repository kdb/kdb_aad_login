<?php

namespace Drupal\kdb_aad_login\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\openid_connect\OpenIDConnectClaims;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class KdbLoginController extends ControllerBase {

  public function __construct(
    protected OpenIDConnectClaims $claims,
    protected EntityTypeManagerInterface $entity_type_manager,
  ) {
    $this->entityTypeManager = $entity_type_manager;
  }

  public function login(Request $request): Response {
    $client_name = 'windows_aad';
    /** @var \Drupal\openid_connect\OpenIDConnectClientEntityInterface $client */
    $client = $this->entityTypeManager->getStorage('openid_connect_client')->loadByProperties(['id' => $client_name])[$client_name];

    $plugin = $client->getPlugin();
    $scopes = $this->claims->getScopes($plugin);
    return $plugin->authorize($scopes);
  }
}
