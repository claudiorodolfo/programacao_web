<?php

/**
 * SCSSPHP
 *
 * @copyright 2012-2020 Leaf Corcoran
 *
 * @license http://opensource.org/licenses/MIT MIT
 *
 * @link http://scssphp.github.io/scssphp
 */

namespace MaxButtons\ScssPhp\ScssPhp\Block;

use MaxButtons\ScssPhp\ScssPhp\Block;
use MaxButtons\ScssPhp\ScssPhp\Type;

/**
 * @internal
 */
class WhileBlock extends Block
{
    /**
     * @var array
     */
    public $cond;

    public function __construct()
    {
        $this->type = Type::T_WHILE;
    }
}
