<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Quote;

use Spryker\Zed\Currency\Communication\Plugin\SetDefaultCurrencyBeforeQuoteCreatePlugin;
use Spryker\Zed\MultiCart\Communication\Plugin\AddDefaultNameBeforeQuoteSavePlugin;
use Spryker\Zed\MultiCart\Communication\Plugin\AddSuccessMessageAfterQuoteCreatedPlugin;
use Spryker\Zed\MultiCart\Communication\Plugin\DeactivateQuotesBeforeQuoteSavePlugin;
use Spryker\Zed\MultiCart\Communication\Plugin\InitDefaultQuoteCustomerQuoteDeleteAfterPlugin;
use Spryker\Zed\MultiCart\Communication\Plugin\ResolveQuoteNameBeforeQuoteCreatePlugin;
use Spryker\Zed\Quote\QuoteDependencyProvider as SprykerQuoteDependencyProvider;
use Spryker\Zed\QuoteApproval\Communication\Plugin\Quote\QuoteApprovalExpanderPlugin;
use Spryker\Zed\QuoteApproval\Communication\Plugin\Quote\RemoveQuoteApprovalsBeforeQuoteDeletePlugin;
use Spryker\Zed\SharedCart\Communication\Plugin\CleanQuoteShareBeforeQuoteCreatePlugin;
use Spryker\Zed\SharedCart\Communication\Plugin\DeactivateSharedQuotesBeforeQuoteSavePlugin;
use Spryker\Zed\SharedCart\Communication\Plugin\MarkAsDefaultQuoteAfterSavePlugin;
use Spryker\Zed\SharedCart\Communication\Plugin\RemoveSharedQuoteBeforeQuoteDeletePlugin;
use Spryker\Zed\SharedCart\Communication\Plugin\SharedQuoteSetDefaultBeforeQuoteSavePlugin;
use Spryker\Zed\SharedCart\Communication\Plugin\UpdateShareDetailsQuoteAfterSavePlugin;

class QuoteDependencyProvider extends SprykerQuoteDependencyProvider
{
    /**
     * @return \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteWritePluginInterface[]
     */
    protected function getQuoteCreateAfterPlugins(): array
    {
        return [
            new AddSuccessMessageAfterQuoteCreatedPlugin(), #MultiCartFeature
        ];
    }

    /**
     * @return \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteWritePluginInterface[]
     */
    protected function getQuoteCreateBeforePlugins(): array
    {
        return [
            new SetDefaultCurrencyBeforeQuoteCreatePlugin(),
            new AddDefaultNameBeforeQuoteSavePlugin(), #MultiCartFeature
            new ResolveQuoteNameBeforeQuoteCreatePlugin(), #MultiCartFeature
            new DeactivateQuotesBeforeQuoteSavePlugin(), #MultiCartFeature
            new CleanQuoteShareBeforeQuoteCreatePlugin(), #SharedCartFeature
            new DeactivateSharedQuotesBeforeQuoteSavePlugin(), #SharedCartFeature
        ];
    }

    /**
     * @return \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteWritePluginInterface[]
     */
    protected function getQuoteUpdateAfterPlugins(): array
    {
        return [
            new UpdateShareDetailsQuoteAfterSavePlugin(), #SharedCartFeature
            new MarkAsDefaultQuoteAfterSavePlugin(), #SharedCartFeature
        ];
    }

    /**
     * @return \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteWritePluginInterface[]
     */
    protected function getQuoteUpdateBeforePlugins(): array
    {
        return [
            new AddDefaultNameBeforeQuoteSavePlugin(), #MultiCartFeature
            new ResolveQuoteNameBeforeQuoteCreatePlugin(), #MultiCartFeature
            new DeactivateQuotesBeforeQuoteSavePlugin(), #MultiCartFeature
            new DeactivateSharedQuotesBeforeQuoteSavePlugin(), #SharedCartFeature
            new SharedQuoteSetDefaultBeforeQuoteSavePlugin(), #SharedCartFeature
        ];
    }

    /**
     * @return \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteWritePluginInterface[]
     */
    protected function getQuoteDeleteBeforePlugins(): array
    {
        return [
            new RemoveSharedQuoteBeforeQuoteDeletePlugin(), #SharedCartFeature
            new RemoveQuoteApprovalsBeforeQuoteDeletePlugin(), #QuoteApproval
        ];
    }

    /**
     * @return \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteExpanderPluginInterface[]
     */
    protected function getQuoteExpanderPlugins(): array
    {
        return [
            new QuoteApprovalExpanderPlugin(), #QuoteApprovalFeature
        ];
    }

    /**
     * @return \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteDeleteAfterPluginInterface[]
     */
    protected function getQuoteDeleteAfterPlugins(): array
    {
        /**
         * @var \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteDeleteAfterPluginInterface[]
         */
        $plugins = [
            new InitDefaultQuoteCustomerQuoteDeleteAfterPlugin(), #MultiCartFeature
        ];

        return $plugins;
    }
}
