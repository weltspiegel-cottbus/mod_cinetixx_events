<?php

/**
 * @package     Weltspiegel\Module\CurrentEvents
 *
 * @copyright   Weltspiegel Cottbus
 * @license     MIT; see LICENSE file
 */

namespace Weltspiegel\Module\CurrentEvents\Site\Helper;

\defined('_JEXEC') or die;

use Exception;
use Joomla\CMS\Factory;

/**
 * Helper for mod_current_events
 *
 * @since 0.1.0
 */
class CurrentEventsHelper
{
	/**
	 * Retrieve list of events from the component
	 *
	 * @return  array|false  Array of events or false on failure
	 *
	 * @throws Exception
	 * @since   0.1.0
	 */
    public static function getEvents(): array|false
    {
        $app = Factory::getApplication();

        // Boot the component and get its MVC factory
        $component = $app->bootComponent('com_weltspiegel');
        $mvcFactory = $component->getMVCFactory();

        // Create the Events model
        $model = $mvcFactory->createModel('Events', 'Site');

        if (!$model) {
            return false;
        }

        // Get all events from the model
        return $model->getItems();
    }
}
