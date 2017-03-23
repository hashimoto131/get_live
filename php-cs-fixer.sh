#!/bin/sh
./bin/php-cs-fixer fix app/Config/Migration
./bin/php-cs-fixer fix app/Console/Command
./bin/php-cs-fixer fix app/Controller
./bin/php-cs-fixer fix app/Model
