<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-23
 * Time: 00:36
 */

namespace AppBundle\Service;


class MarkdownTransformer
{

    public function parse($str)
    {
        return strtoupper($str);
    }
}