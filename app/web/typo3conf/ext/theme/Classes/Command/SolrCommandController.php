<?php
namespace JosefGlatz\Theme\Command;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;

/**
 * Controller to run solr specific tasks via CLI
 */
class SolrCommandController extends CommandController
{

    /**
     * Update EXT:solr connections task
     *
     *  Older EXT:solr versions do not support executing
     *
     */
    public function updateConnectionsCommand()
    {
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $connectionManager = GeneralUtility::makeInstance(\ApacheSolrForTypo3\Solr\ConnectionManager::class);
        $connectionManager->updateConnections();
        $this->outputLine('<info>EXT:solr connections are updated in the registry.</info>');
        $this->sendAndExit();
    }
}
