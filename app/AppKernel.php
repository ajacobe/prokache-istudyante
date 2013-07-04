<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    protected function initializeContainer()
    {
        static $first = true;
    
        if ('test' !== $this->getEnvironment()) {
            parent::initializeContainer();
            return;
        }
    
        $debug = $this->debug;
    
        if (!$first) {
            // disable debug mode on all but the first initialization
            $this->debug = false;
        }
    
        // will not work with --process-isolation
        $first = false;
    
        try {
            parent::initializeContainer();
        } catch (\Exception $e) {
            $this->debug = $debug;
            throw $e;
        }
    
        $this->debug = $debug;
    }
    
    
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),

			new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Istudyante\AdminBundle\AdminBundle(),
            new Istudyante\UserBundle\UserBundle(),
        );

		if (in_array($this->getEnvironment(), array('dev', 'test'))) {
			$bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
			$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
			#$bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
			
			if ($this->getEnvironment() === 'dev') {
			    $bundles[] = new JMS\DebuggingBundle\JMSDebuggingBundle($this);
			}
		}
        

        return $bundles;
    }

    /**
     * Overridden to provide extended debugging capabilities for JMSDebuggingBundle
     * @see \Symfony\Component\HttpKernel\Kernel::getContainerBaseClass()
     */
    protected function getContainerBaseClass()
    {
        if ($this->getEnvironment() === 'dev') {
            return '\JMS\DebuggingBundle\DependencyInjection\TraceableContainer';
        }

        return parent::getContainerBaseClass();
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
    
