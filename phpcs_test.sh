#!/bin/sh
./bin/phpcs --report=diff --report-file=test/phpcs.diff --standard=test/phpcs_ruleset.xml \
app/Config/Migration

Command=`./bin/phpcs --report=diff --standard=test/phpcs_ruleset.xml \
--ignore=app/Console/Command/SeedShell.php \
app/Console/Command`
echo "$Command" >> test/phpcs.diff


Controller=`./bin/phpcs --report=diff --standard=test/phpcs_ruleset.xml \
--ignore=app/Controller/PagesController.php \
app/Controller`
echo "$Controller" >> test/phpcs.diff

Model=`./bin/phpcs --report=diff --standard=test/phpcs_ruleset.xml \
app/Model`
echo "$Model" >> test/phpcs.diff
