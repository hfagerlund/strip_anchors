<?php
/**
 * @author Heini Fagerlund
 * (https://github.com/hfagerlund/strip_anchors/)
 */
namespace App\Tests\Twig;

use App\Twig\AppExtension;
use PHPUnit\Framework\TestCase;

class AppExtensionTest extends TestCase
{
    private $_testable = null;
    public function setUp()
    {
        $this->_testable = new AppExtension();
    }

    public function tearDown()
    {
        $this->_testable = null;
    }

    /**
     * @dataProvider getStripAnchorsTestData
     */
    public function testStripAnchors($input, $expectedOutput)
    {
	$output=$this->_testable->removeAnchors($input);
        $this->assertEquals($output, $expectedOutput);
    }

    public function getStripAnchorsTestData()
    {
        return array(
            array('<h2><a href="#features">Features</a></h2>', '<h2>Features</h2>'),
            array('<h3><a class="foobar" data-js="foo" href="#subheading" id="bar">Test Subheading</a></h3>', '<h3>Test Subheading</h3>'),
            array('<a id="features"></a><h3 class="foo bar"><a class="foobar" href="#features">Features of this Twig Extension</a></h3>', '<a id="features"></a><h3 class="foo bar">Features of this Twig Extension</h3>'),
            array
                ('<h2>Custom Twig Extension</h2><p>The strip_anchors <a href="https://github.com/twigphp/Twig/" title="Visit Twig project on GitHub">Twig (v.2.5.0)</a> filter removes all anchor links (ie. links pointing to different sections of the same page where they are located) from input.</p><p><strong>Please note:</strong>This repository only shows directories and files from a <a href="#how-to-use-in-symfony-4">Symfony 4 skeleton project</a> that <strong>need to be added or modified</strong> to enable the \'strip_anchors\' Twig extension.</p><a id="usage"></a><h2 class="anchor"><a href="#usage">Usage</a></h2><p>Use this Twig filter in an RSS feed template to help transform HTML input into valid RSS 2.0 .</p><a id="how-to-use-in-symfony-4"></a><h3 class="anchor"><a href="#how-to-use-in-symfony-4">How To use in Symfony 4</a></h3><p>This repository shows how this custom Twig extension (ie. the `strip_anchors` Twig filter) can be implemented in a Symfony 4 project structure created using <a href="https://symfony.com/doc/current/best_practices/creating-the-project.html">symfony/skeleton</a>.</p>',
			'<h2>Custom Twig Extension</h2><p>The strip_anchors <a href="https://github.com/twigphp/Twig/" title="Visit Twig project on GitHub">Twig (v.2.5.0)</a> filter removes all anchor links (ie. links pointing to different sections of the same page where they are located) from input.</p><p><strong>Please note:</strong>This repository only shows directories and files from a Symfony 4 skeleton project that <strong>need to be added or modified</strong> to enable the \'strip_anchors\' Twig extension.</p><a id="usage"></a><h2 class="anchor">Usage</h2><p>Use this Twig filter in an RSS feed template to help transform HTML input into valid RSS 2.0 .</p><a id="how-to-use-in-symfony-4"></a><h3 class="anchor">How To use in Symfony 4</h3><p>This repository shows how this custom Twig extension (ie. the `strip_anchors` Twig filter) can be implemented in a Symfony 4 project structure created using <a href="https://symfony.com/doc/current/best_practices/creating-the-project.html">symfony/skeleton</a>.</p>'),
        );
    }
}
