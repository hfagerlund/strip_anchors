<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Twig;

use Twig\Extension;
use Twig\TwigFilter;

/**
 * Custom 'strip_anchors' filter helps to transform HTML content
 * into valid RSS2.0
 *
 * @author Heini Fagerlund
 * (https://github.com/hfagerlund/strip_anchors/)
 */

class AppExtension extends \Twig_Extension
{
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('strip_anchors', [$this, 'removeAnchors'], ['is_safe' => ['html']]),
        ];
    }

    public function getName()
    {
        return 'app_extension';
    }

    /**
     * Removes anchor links from input.
     */
    public function removeAnchors($content)
    {
        $dom = new \DomDocument();
        $dom->loadHTML($content);
        $links = $dom->getElementsByTagName('a');

        foreach ($links as $link){
            //is anchor link?
            if (strpos($link->getAttribute('href'), '#') !== FALSE){
                //remove opening and closing <a> tags (display only anchor text)
                $newlink = $dom->createTextNode($link->nodeValue);
                $link->parentNode->replaceChild($newlink, $link);
            }
        }
        //remove wrapper from output of $dom->saveHTML()
        $content = preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $dom->saveHTML());
        return $content;
    }
}
