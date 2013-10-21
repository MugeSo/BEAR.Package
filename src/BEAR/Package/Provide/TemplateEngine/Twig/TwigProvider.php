<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Package\Provide\TemplateEngine\Twig;

use BEAR\Sunday\Inject\AppDirInject;
use BEAR\Sunday\Inject\TmpDirInject;
use Ray\Di\ProviderInterface as Provide;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;

/**
 * Twig
 *
 * @see http://www.smarty.net/docs/ja/
 */
class TwigProvider implements Provide
{
    use TmpDirInject;

    /**
     * @var string
     */
    private $libDir;

    /**
     * @Inject
     * @Named("vendor_dir")
     */
    public function setVendor($libDir)
    {
        $this->libDir = $libDir;
    }

    /**
     * Return instance
     *
     * @return \Twig_Environment
     */
    public function get()
    {
        $loader = new Twig_Loader_Filesystem($this->libDir . '/twig/templates');
        $twig = new Twig_Environment($loader, array(
            'cache' => $this->tmpDir . '/twig',
        ));
        return $twig;
    }
}
