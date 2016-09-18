#!/bin/bash

set -e

if [ $TEST_GROUP = "Sauce" ] && [ $TRAVIS_SECURE_ENV_VARS = "false" ]
then
    exit 0
fi

if [ $TEST_GROUP = "unit" ]
then
    ./vendor/bin/phpunit --exclude-group Sauce,ignoreOnTravis --colors Tests/
else
    ./vendor/bin/phpunit --group $TEST_GROUP --colors Tests/
fi
