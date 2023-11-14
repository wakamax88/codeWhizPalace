<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class ExtensionRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        $extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
        return in_array($extension, $params);
    }
    public function getMessage(array $data, string $field, array $params): string
    {
        return "Invalid selection";
    }
}
