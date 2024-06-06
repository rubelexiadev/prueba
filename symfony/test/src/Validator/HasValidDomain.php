<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class HasValidDomain extends Constraint
{
    public string $message = 'The domain of the submitted email "{{ email }}" is not valid.';
    public string $forbiddenDomain;

    public function __construct(
        public string $mode,
        $forbiddenDomain,
        ?array $groups = null,
        mixed $payload = null,
    ) {
        parent::__construct([], $groups, $payload);

        $this->forbiddenDomain = $forbiddenDomain;
    }
}