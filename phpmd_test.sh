#!/bin/sh
rm -f test/test_phpmd.html
touch test/test_phpmd.html
Migration=`./bin/phpmd app/Config/Migration html test/phpmd_ruleset.xml`
Command=`./bin/phpmd app/Console/Command --exclude SeedShell.php  html test/phpmd_ruleset.xml`
Controller=`./bin/phpmd app/Controller  --exclude PagesController.php html test/phpmd_ruleset.xml`
Model=`./bin/phpmd app/Model html test/phpmd_ruleset.xml`
echo "$Migration" >> test/test_phpmd.html
echo "$Command" >> test/test_phpmd.html
echo "$Controller" >> test/test_phpmd.html
echo "$Model" >> test/test_phpmd.html
