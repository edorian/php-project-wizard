PHP Project Wizard (PPW)
========================

The **PHP Project Wizard (PPW)** is a commandline tool that can be used to generate the scripts and configuration files necessary for the build automation of a PHP project.

Installation
------------

The PHP Project Wizard (PPW) should be installed using the [PEAR Installer](http://pear.php.net/). This installer is the backbone of PEAR, which provides a distribution system for PHP packages, and is shipped with every release of PHP since version 4.3.0.

The PEAR channel (`pear.phpunit.de`) that is used to distribute the PHP Project Wizard (PPW) needs to be registered with the local PEAR environment. Furthermore, a component that the PHP Project Wizard (PPW) depends upon is hosted on the eZ Components PEAR channel (`components.ez.no`).

    pear channel-discover pear.phpunit.de
    pear channel-discover components.ez.no

This has to be done only once. Now the PEAR Installer can be used to install packages from the PHPUnit channel:

    pear install phpunit/ppw

Usage Example
-------------

Consider the following directory structure:

    project
    |-- src
    |   |-- autoload.php
    |   `-- ...
    `-- tests
        `-- ...

Using the `ppw` commandline tool we can now generate the scripts and configuration files necessary for build automation:

    sb@vmware bankaccount % ppw --source src --tests tests --name bankaccount --bootstrap src/autoload.php
    PHP Project Wizard (PPW) 1.0.0 by Sebastian Bergmann.

    Wrote build script for Apache Ant to /usr/local/src/ppw/PPW/Template/build.xml
    Wrote build configuration for Apache Ant to /usr/local/src/ppw/PPW/Template/build.properties
    Wrote configuration for PHPUnit to /usr/local/src/ppw/PPW/Template/phpunit.xml.dist

Executing the generated build script with Apache Ant will produce the following `build` directory:

    build
    |-- api ...
    |-- code-browser ...
    |-- coverage ...
    `-- logs
        |-- checkstyle.xml
        |-- clover.xml
        |-- jdepend.xml
        |-- junit.xml
        |-- phploc.csv
        |-- pmd-cpd.xml
        `-- pmd.xml

The build artifacts shown above are exactly what the [template for Jenkins jobs for PHP projects](http://jenkins-php.org/) expects.
