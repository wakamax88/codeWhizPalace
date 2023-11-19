<?php

declare(strict_types=1);

function dd(mixed $value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die;
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value);
}

function redirectTo(string $path)
{
    header("Location: {$path}");
    http_response_code(302);
    exit;
}
function capitalizeFirstLetter($inputString)
{
    $words = explode(' ', $inputString);
    $capitalizedWords = array_map('ucfirst', $words);
    $result = implode('', $capitalizedWords);
    return lcfirst($result);
}

function calculPagination(int $numberRow, array $option, int $min)
{
    $show = abs((int) filter_var($_GET['show'] ?? $min, FILTER_SANITIZE_NUMBER_INT));
    $limit = in_array($show, $option) ? $show : $min;
    $page = abs((int) filter_var($_GET['page'] ?? 1, FILTER_SANITIZE_NUMBER_INT));
    $pageMax = (int) ceil($numberRow / $limit);
    $page = $page > $pageMax ? $pageMax : $page;
    $page = $page < 1 ? 1 : $page;
    $offset = ($page - 1) * $limit;
    return [
        'limit' => $limit,
        'offset' => $offset,
        'pageMax' => $pageMax,
        'page' => $page,

    ];
}
