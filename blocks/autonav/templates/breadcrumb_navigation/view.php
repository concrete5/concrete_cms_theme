<?php

/**
 * @project:   ConcreteCMS Theme
 *
 * @copyright  (C) 2021 Portland Labs (https://www.portlandlabs.com)
 * @author     Fabian Bitter (fabian@bitter.de)
 */

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Page\Page;

$navItems = $controller->getNavItems(true); // Ignore exclude from nav
$c = Page::getCurrentPage();

if (count($navItems) > 0) {
    echo '<nav role="navigation" aria-label="breadcrumb">'; //opens the top-level menu
    echo '<ol class="breadcrumb">';

    foreach ($navItems as $ni) {
        if ($ni->isCurrent) {
            echo '<li class="breadcrumb-item active">' . $ni->name . '</li>';
        } else {
            echo '<li class="breadcrumb-item"><a href="' . $ni->url . '" target="' . $ni->target . '">' . $ni->name . '</a></li>';
        }
    }

    echo '</ol>';
    echo '</nav>'; //closes the top-level menu
} elseif (is_object($c) && $c->isEditMode()) {
    ?>
    <div class="ccm-edit-mode-disabled-item"><?= t('Empty Auto-Nav Block.') ?></div>
    <?php
}
