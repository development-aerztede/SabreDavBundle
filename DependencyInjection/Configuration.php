<?php

namespace Arzttermine\SabreDavBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('arzttermine_sabredav');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

	$rootNode
            ->children()
		->arrayNode('plugins')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('acl')->defaultFalse()->end()
                        ->booleanNode('auth')->defaultFalse()->end()
                        ->booleanNode('content_type')->defaultFalse()->end()
                        ->booleanNode('principal')->defaultFalse()->end()
                        ->booleanNode('caldav')->defaultFalse()->end()
                    ->end()
                ->end()
	->end();

        return $treeBuilder;
    }
}
