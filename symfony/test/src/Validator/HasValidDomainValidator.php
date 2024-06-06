<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class HasValidDomainValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof HasValidDomain) {
            throw new UnexpectedTypeException($constraint, HasValidDomain::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (explode('@', $value)[1] != $constraint->forbiddenDomain) {
            return;
        }

        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ email }}', $value)
            ->addViolation();
    }
}