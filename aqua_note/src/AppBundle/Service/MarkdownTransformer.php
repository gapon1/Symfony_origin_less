<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-23
 * Time: 00:36
 */

namespace AppBundle\Service;


use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class MarkdownTransformer
{

    private $markdownParser;

    public function __construct(MarkdownParserInterface $markdownParser)
    {
        $this->markdownParser = $markdownParser;

    }

    public function parse($str)
    {
        return $this->markdownParser->transformMarkdown($str);
    }
}