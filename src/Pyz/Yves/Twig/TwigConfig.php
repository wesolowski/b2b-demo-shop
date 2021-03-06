<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig;

use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Yves\Twig\TwigConfig as SprykerTwigConfig;

class TwigConfig extends SprykerTwigConfig
{
    /**
     * @project Only needed in Project, not in demoshop
     *
     * @param array $paths
     *
     * @return array
     */
    protected function addCoreTemplatePaths(array $paths)
    {
        $paths = parent::addCoreTemplatePaths($paths);

        $themeName = $this->getThemeName();
        $paths[] = $this->get(KernelConstants::SPRYKER_ROOT) . '/%1$s/src/Spryker/Yves/%1$s/Theme/' . $themeName;
        $paths[] = APPLICATION_VENDOR_DIR . '/spryker-shop/%1$s/src/SprykerShop/Yves/%1$s/Theme/' . $themeName;
        $paths[] = APPLICATION_VENDOR_DIR . '/spryker-eco/%1$s/src/SprykerEco/Yves/%1$s/Theme/' . $themeName;

        return $paths;
    }
}
