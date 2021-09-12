<?php

declare(strict_types=1);

namespace FamilyOfficeOnionLocation5\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\Configuration\CachedReader;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class TemplateRegistration implements SubscriberInterface
{
    private string $pluginDirectory;
    private \Enlight_Template_Manager $templateManager;
    private ContainerInterface $container;
    private string $pluginName;

    public function __construct(
        string $pluginDirectory,
        \Enlight_Template_Manager $templateManager,
        ContainerInterface $container,
        string $pluginName
    ) {
        $this->pluginDirectory = $pluginDirectory;
        $this->templateManager = $templateManager;
        $this->container = $container;
        $this->pluginName = $pluginName;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'Enlight_Controller_Action_PreDispatch' => 'onPreDispatch',
        ];
    }

    public function onPreDispatch(\Enlight_Controller_ActionEventArgs $args): void
    {
        $this->templateManager->addTemplateDir($this->pluginDirectory . '/Resources/views');

        if (!$this->container->initialized('shop')) {
            return;
        }

        if (null === $shop = $this->container->get('shop')) {
            return;
        }

        /** @var CachedReader|null $configReader */
        $configReader = $this->container->get(CachedReader::class);

        if (null === $configReader) {
            return;
        }

        $config = $configReader->getByPluginName($this->pluginName, $shop->getId());
        $args->getSubject()->View()->assign('onionLocation', $config['onionLocation']);
    }
}
