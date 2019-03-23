<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-23
 * Time: 14:34
 */

namespace AppBundle\Twig;


class MarkdownExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('markdowns', array($this, 'parse_markdown'))
        ];
    }

    public function parseMarkdown($str)
    {
        return strtoupper($str);
    }


    public function getName()
    {
        return 'app_markdowns';
    }


}