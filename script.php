<?php
/**
 * Installer script: shows message after install.
 */
defined('_JEXEC') or die;

/**
 * Joomla installer script class for this plugin.
 *
 * Works in Joomla 3/4/5.
 */
class plgSystemInstallmessageInstallerScript
{
	/**
	 * Runs after install/update/uninstall.
	 *
	 * @param string $type   install|update|discover_install|uninstall
	 * @param mixed  $parent Installer adapter
	 */
	public function postflight($type, $parent)
	{
		if (!in_array($type, ['install', 'update']))
		{
			return true;
		}

		$app = \Joomla\CMS\Factory::getApplication();

		// 🔥 Clear default Joomla success messages
		$app->getMessageQueue(true);

		$message = 'Please follow the steps below to update your miniOrange Joomla extension:<br>'
			. '1. Visit https://portal.miniorange.com/downloads and log in using your miniOrange account credentials.<br>'
			. '2. Navigate to the Downloads section and download the latest version of your extension.<br>'
			. '3. Take a complete backup of your Joomla site, including the extension configuration.<br>'
			. '4. Go to Joomla Administrator → System → Install → Extensions and upload the downloaded ZIP file to update the extension.<br>'
			. 'If you need any assistance, please contact us at joomlasupport@xecurify.com.';

		$app->enqueueMessage($message, 'warning');

		return true;
	}

}

