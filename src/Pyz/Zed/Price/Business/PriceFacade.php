<?php

namespace Pyz\Zed\Price\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Price\Business\PriceFacade as SprykerPriceFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\Price\Business\PriceBusinessFactory getFactory()
 */
class PriceFacade extends SprykerPriceFacade implements PriceFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
