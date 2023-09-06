#!/bin/bash

# installation script for development & production use
# install: all requirements

# install composer
php composer.phar upgrade
php composer.phar update
