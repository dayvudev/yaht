# Description
Utility for writing web pages in 'YAML' and converting them to 'HTML'.

# Instalation
### Composer
1. Run `composer config repositories.dayvudev/yaht vcs git@github.com:dayvudev/yaht.git`
1. Run `composer require dayvudev/yaht:v1.0.0-dev`
### Linux Terminal
1. Run `composer install && bin/init`
### Windows Powershell
1. Run `composer install; bin/init.bat`

# Configuration
1. See example in `vendor/dayvu/yaht/config/head.yaml` and `vendor/dayvu/yaht/config/body.yaml`

# Usage
1. Run `bin/run`
1. Open file `result/result.html` in a web browser.