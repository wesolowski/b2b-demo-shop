<?php

namespace Pyz\Zed\Glossary\Business;

use Spryker\Zed\Glossary\Business\GlossaryFacade as SprykerGlossaryFacade;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

/**
 * @method \Pyz\Zed\Glossary\Business\GlossaryBusinessFactory getFactory()
 */
class GlossaryFacade extends SprykerGlossaryFacade implements GlossaryFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger

     * @return void
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
