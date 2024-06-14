<?php

namespace App\Validation;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

#[\Attribute(\Attribute::TARGET_CLASS)]
class AtLeastOneRequired extends Constraint
{
    /**
     * @var string[]
     */
    public array $requiredFields;

    public string $message = 'At least one of {{ fields }} is required.';

    final public const ONE_REQUIRED_ERROR = '796ecea9-3df5-4627-be6b-ede81ca60f73';

    protected const ERROR_NAMES = [
        self::ONE_REQUIRED_ERROR => 'ONE_REQUIRED_ERROR',
    ];

    public function __construct(
        array $options = [],
        ?array $requiredFields = null,
        ?string $message = null,
        ?array $groups = null,
        $payload = null)
    {
        if (!empty($options) && array_is_list($options)) {
            $requiredFields ??= $options;
            $options = [];
        }

        if (empty($requiredFields)) {
            throw new ConstraintDefinitionException('The "requiredFields" of AtLeastOneRequired constraint cannot be empty');
        }

        $options['value'] = $requiredFields;

        parent::__construct($options, $groups, $payload);

        $this->requiredFields = $requiredFields;
        $this->message = $message ?? $this->message;
    }

    public function getRequiredOptions(): array
    {
        return ['requiredFields'];
    }

    public function getDefaultOption(): string
    {
        return 'requiredFields';
    }

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
