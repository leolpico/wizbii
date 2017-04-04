<?php
/**
 * Created by PhpStorm.
 * User: LP
 * Date: 03/04/2017
 * Time: 12:53
 */

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class LessThanParameter extends Constraint
{
    public $message = '"%string%" is not a valid number';
}