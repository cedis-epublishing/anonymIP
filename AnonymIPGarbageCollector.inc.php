<?php

/**
 * @file plugins/generic/anonymIP/AnonymIPGarbageCollector.inc.php
 *
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class AnonymIPGarbageCollector
 *
 * @brief Scheduled task to run session garbage collection.
 */

import('lib.pkp.classes.scheduledTask.ScheduledTask');

class AnonymIPGarbageCollector extends ScheduledTask {
	
	/**
	 * Constructor.
	 * @param $argv array task arguments
	 */
	function __construct($args)  {		
		parent::__construct($args);
	}

	/**
	 * @see ScheduledTask::getName()
	 */
	function getName() {
		return __('plugins.generic.anonymip.gcTask.name');
	}

	/**
	 * @see ScheduledTask::executeActions()
	 */
	function executeActions() {	
		$sessionManager =& SessionManager::getManager();
		$sessionManager->gc(86400);
		return true;
	}

}

?>
