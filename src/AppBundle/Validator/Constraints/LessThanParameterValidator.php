<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\DependencyInjection\Container;

class LessThanParameterValidator extends ConstraintValidator
{
    private $paramValue;
    /**
     * LessThanParameterValidator constructor.
     */
    public function __construct($paramValue)
    {
        $this->paramValue= $paramValue;
    }

    public function validate($value, Constraint $constraint)
    {
        if ($value > $this->paramValue) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}