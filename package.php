<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * This is the package.xml generator for Psr\Log
 *
 * PHP version 5.3+
 *
 * Psr\Log\LoggerTrait requires PHP 5.4+
 *
 * LICENSE:
 *
 * Copyright (c) 2012 PHP Framework Interoperability Group
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category  Psr
 * @package   Log
 * @author    Jordi Boggiano
 * @author    Michael Gauthier <mike@silverorange.com>
 * @copyright 2012 PHP Framework Interoperability Group
 * @copyright 2013 silverorange
 * @license   http://www.opensource.org/licenses/mit-license.html MIT License
 */

require_once 'PEAR/PackageFileManager2.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$apiVersion     = '1.0.0';
$apiState       = 'stable';

$releaseVersion = '1.0.0';
$releaseState   = 'stable';

$releaseNotes   = <<<EOT
 * PEAR package of Git repository.
EOT;

$description = <<<EOT
PSR-3 Log interfaces and helper classes.
EOT;

$package = new PEAR_PackageFileManager2();

$package->setOptions(
    array(
        'filelistgenerator'                   => 'file',
        'simpleoutput'                        => true,
        'baseinstalldir'                      => '/',
        'packagedirectory'                    => './',
        'dir_roles'                           => array(
            'Psr'                             => 'php',
            'Psr/Log'                         => 'php',
            'Psr/Log/Test'                    => 'php'
        ),
        'exceptions'                          => array(
            'LICENSE'                       => 'doc',
            'README.md'                     => 'doc'
        ),
        'ignore'                              => array(
            '.gitignore',
            'composer.json',
            'package.php',
            'package.xml',
            '*.tgz',
            '*.zip'
        )
    )
);

$package->setPackage('PSR_Log');
$package->setSummary('PSR-3 Log interfaces and helper classes.');
$package->setDescription($description);
$package->setChannel('pear.silverorange.com');
$package->setPackageType('php');
$package->setLicense(
    'MIT',
    'http://www.opensource.org/licenses/mit-license.html'
);

$package->setReleaseVersion($releaseVersion);
$package->setReleaseStability($releaseState);
$package->setAPIVersion($apiVersion);
$package->setAPIStability($apiState);
$package->setNotes($releaseNotes);

$package->addMaintainer(
    'lead',
    'gauthierm',
    'Mike Gauthier',
    'mike@silverorange.com'
);

$package->setPhpDep('5.3.0');
$package->setPearinstallerDep('1.4.0');
$package->generateContents();

if (   isset($_GET['make'])
    || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')
) {
    $package->writePackageFile();
} else {
    $package->debugPackageFile();
}

?>
