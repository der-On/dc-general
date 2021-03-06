<?php

/**
 * This file is part of contao-community-alliance/dc-general.
 *
 * (c) 2013-2015 Contao Community Alliance.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    contao-community-alliance/dc-general
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @copyright  2013-2015 Contao Community Alliance.
 * @license    https://github.com/contao-community-alliance/dc-general/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace ContaoCommunityAlliance\DcGeneral\Contao\Callback;

use ContaoCommunityAlliance\DcGeneral\Contao\Compatibility\DcCompat;
use ContaoCommunityAlliance\DcGeneral\Contao\View\Contao2BackendView\Event\GetParentHeaderEvent;

/**
 * Class ContainerHeaderCallbackListener.
 *
 * Handler for the header row in parent list mode.
 */
class ContainerHeaderCallbackListener extends AbstractReturningCallbackListener
{
    /**
     * Retrieve the arguments for the callback.
     *
     * @param GetParentHeaderEvent $event The event being emitted.
     *
     * @return array
     */
    public function getArgs($event)
    {
        return array($event->getAdditional(), new DcCompat($event->getEnvironment()));
    }

    /**
     * Update the event with the information returned by the callback.
     *
     * @param GetParentHeaderEvent $event The event being emitted.
     *
     * @param array                $value The additional information.
     *
     * @return void
     */
    public function update($event, $value)
    {
        if ($value === null) {
            return;
        }

        $event->setAdditional($value);
        $event->stopPropagation();
    }
}
