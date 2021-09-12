<?php

declare(strict_types=1);

namespace FamilyOfficeOnionLocation5;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\InstallContext;

final class FamilyOfficeOnionLocation5 extends Plugin
{
    public function activate(ActivateContext $context): void
    {
        $context->scheduleClearCache(InstallContext::CACHE_LIST_FRONTEND);
    }
}
