# KDB Azure Active Directory
Add-on module for [DPL-CMS](https://github.com/danskernesdigitalebibliotek/dpl-cms) to support integration with [Azure Active Directory module](https://www.drupal.org/project/openid_connect_windows_aad).

The Azure Active Directory module enables a new ADD specific client for the [OpenID Connect module](https://www.drupal.org/project/openid_connect).

## The module has the following features:

### Overwrite default login logic
The modules overwrite the normal login logic and send the user directly to the
KKB AD login page.
It does this by adding a routeSubscriber which adds a new controller to the
user.login route.
The controller then checks if an OpenID Connect client called 'windows_aad'
exists, and then it redirects the user to the client authorization endpoint.
