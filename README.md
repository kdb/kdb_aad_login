# KDB Azure Active Directory
Add-on module for [DPL-CMS](https://github.com/danskernesdigitalebibliotek/dpl-cms) to support integration with [Azure Active Directory module](https://www.drupal.org/project/openid_connect_windows_aad).

The Azure Active Directory module enables a new ADD specific client for the [OpenID Connect module](https://www.drupal.org/project/openid_connect).

## The module has the following features:

### Overwrite default login logic
The module overwrites the default login route, and sends the user directly to the AAD login page when using the /user route.
This is done to prevent users from accessing the default Drupal login page.
