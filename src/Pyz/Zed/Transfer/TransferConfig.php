<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Transfer;

use Spryker\Shared\Library\Environment;
use Spryker\Zed\Transfer\TransferConfig as SprykerTransferConfig;

class TransferConfig extends SprykerTransferConfig
{

    /**
     * @return string[]
     */
    protected function getAdditionalSourceDirectoryGlobPatterns()
    {
        $directoryGlobPatterns = [];

        if (Environment::isDevelopment()) { //only needed in Project, not in demoshop (case sensitivity vs lower-case-dash)
            $directoryGlobPatterns[] = APPLICATION_VENDOR_DIR . '/code-generator/src/*/Shared/*/Transfer/';
        }

        return $directoryGlobPatterns;
    }

}