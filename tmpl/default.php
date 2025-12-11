<?php

/**
 * @package     Weltspiegel\Module\CinetixxEvents
 *
 * @copyright   Weltspiegel Cottbus
 * @license     MIT; see LICENSE file
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;

/**
 * @var Joomla\CMS\WebAsset\WebAssetManager $wa
 * @var Joomla\Registry\Registry $params
 * @var array $events
 */

// Don't display anything if there are no events
if (empty($events) || !is_array($events)) {
    return;
}

// Separate events into 3D and 2D
$events3D = [];
$events2D = [];

foreach ($events as $id => $event) {
    if (!empty($event->is3D)) {
        $events3D[$id] = $event;
    } else {
        $events2D[$id] = $event;
    }
}

?>
<div class="mod-cinetixx-events">
    <?php if (!empty($events3D)) : ?>
        <h3>Aktuell in 3D</h3>
        <div class="row g-3 mb-4">
            <?php foreach ($events3D as $id => $event) : ?>
                <?php
                $detailRoute = Route::_('index.php?option=com_cinetixx&view=event&event_id=' . $id);
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="<?= $detailRoute ?>" class="d-block">
                        <?php if (!empty($event->poster)) : ?>
                            <img src="<?= $event->poster ?>"
                                 alt="<?= htmlspecialchars($event->title) ?>"
                                 class="img-fluid rounded">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($events2D)) : ?>
        <h3>Aktuell in 2D</h3>
        <div class="row g-3">
            <?php foreach ($events2D as $id => $event) : ?>
                <?php
                $detailRoute = Route::_('index.php?option=com_cinetixx&view=event&event_id=' . $id);
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="<?= $detailRoute ?>" class="d-block">
                        <?php if (!empty($event->poster)) : ?>
                            <img src="<?= $event->poster ?>"
                                 alt="<?= htmlspecialchars($event->title) ?>"
                                 class="img-fluid rounded">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
