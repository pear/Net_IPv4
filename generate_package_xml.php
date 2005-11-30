<?php

require_once 'PEAR/PackageFileManager.php';

$pkg = new PEAR_PackageFileManager();

$build = (isset($argv[1]) && strcmp($argv[1], 'build')!==false) ? true : false;

/**
 * directory settings
 */
$cvsdir  = dirname(__FILE__);
$packagedir = &$cvsdir;

/**
 * package configuration
 */
$category = 'Net';
$package = 'Net_IPv4';
$version = '1.3';
$state = 'stable';

$summary = 'IPv4 network calculations and validation.';

$description = <<<EOT
Class used for calculating IPv4 (AF_INET family) address information
such as network as network address, broadcast address, and IP address
validity.
EOT;

$notes = <<<EOT
* Fixed all pending bugs
* Fixed coding styles
* Added class documentation
EOT;

$e = $pkg->setOptions(array(
			'simpleoutput' 		=> true,
			'baseinstalldir' 	=> $category,
			'summary' 			=> $summary,
			'description' 		=> $description, 
			'version' 			=> $version,
			'license' 			=> 'PHP License 3.01',
			'packagedirectory' 	=> $packagedir,
			'pathtopackagefile' => $packagedir,
			'state'             => $state,
			'filelistgenerator' => 'cvs',
			'notes'             => $notes,
			'package'           => $package,
			'dir_roles' 		=> array(
									'docs' => 'doc'
									),
			'ignore' 			=> array(
									'*.xml',
									'*.tgz',
									'generate_package*',
									),
			));
    
if (PEAR::isError($e)) {
	echo $e->getMessage();
	exit;
}

$e = $pkg->addMaintainer('bate', 'lead', 'Marco Kaiser', 'bate@php.net'); 
$e = $pkg->addMaintainer('fa', 'developer', 'Florian Anderiasch', 'fa@php.net'); 
//$e = $pkg->addMaintainer('ekilfoil', 'lead', 'Eric Kilfoil', 'eric@ypass.net', 'no'); 

if (PEAR::isError($e)) {
	echo $e->getMessage();
	exit;
}

//$e = $pkg->addDependency('php', '4.2', 'ge', 'php');
//$e = $pkg->addDependency('mhash', null, 'has', 'ext');

$e = $pkg->addGlobalReplacement('package-info', '@package_version@', 'version');
$e = $pkg->addGlobalReplacement('pear-config', '@data_dir@', 'data_dir');

if (PEAR::isError($e)) {
	echo $e->getMessage();
	exit;
}


if ($build) {
	$e = $pkg->writePackageFile();
} else {
	$e = $pkg->debugPackageFile();
}