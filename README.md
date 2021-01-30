# vgs
vgs challenge

This application makes use of the inbound and outbound routes from VGS to redact and create an alias for sensitive information.

In order to test or use for your specific environment the following env variables are available to configure:

USER NAME:
Replace <User_Name> with your own username. (Given to you from VGS)
$_ENV['User_Name'] = '<User_Name>';

USER PASSWORD:
Replace <Password> with your own password. (Given to you from VGS)
$_ENV['Password'] = '<Password>';

VAULT ID:
Replace <Vault_ID> with your vault ID. (Given to you from VGS)
$_ENV['Vault_ID'] = '<Vault_ID>';

ECHO URL:
Do not edit unless you have a reason to.
$_ENV['url'] = 'https://echo.apps.verygood.systems/post';

PROXY:
Do not edit unless you have a reason to.
$_ENV['proxy'] = 'http://tnthgey3yhb.SANDBOX.verygoodproxy.com:8080';

CERTIFICATE PATH:
Can be edited if path or file name is changed.
$_ENV['certpath'] = __DIR__.'/cert/sandbox.pem';