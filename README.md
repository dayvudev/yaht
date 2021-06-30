# Description
Utility for writing web pages in 'YAML' and converting them to 'HTML'.

# Installation
### Composer
1. Run `composer config repositories.dayvudev/yaht vcs git@github.com:dayvudev/yaht.git`.
1. Run `composer require dayvudev/yaht`.
### Linux Terminal
1. Run `vendor/bin/yaht_init`.
### Windows Powershell
1. Run `vendor/bin/yaht_init.bat`.

# Configuration
1. Create `bin/yaht_user_define.php` to overwrite `vendor/dayvudev/yaht/bin/yaht_define.php` file.
1. Create `bin/yaht_user_init_set.php` to overwrite `vendordayvudev/yaht/bin/yaht_init_set.php` file.

# Usage
### Before use
1. In case of problems with memory limit or execution time limit, create `bin/yaht_user_init_set.php` file and set new PHP limits.
1. For an example of a "YAML" configuration, see `vendor/dayvudev/yaht/config/*.yaml` files.
### Linux Terminal
1. Run `vendor/bin/yaht_run`.
1. Open file `result/yaht_result.html` in a web browser.
### Windows Powershell
1. Run `vendor/bin/yaht_run.bat`.
1. Open file `result/yaht_result.html` in a web browser.