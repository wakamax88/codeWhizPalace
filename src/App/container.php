<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database, Container};
use App\Config\Paths;
use App\Services\{ValidatorService, AccountService, ProfileService, PostService};

return [
    TemplateEngine::class => fn () => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService(),
    Database::class => fn () => new Database('mysql', ['host' => 'localhost', 'port' => 3306, 'dbname' => 'code_whiz_palace'], 'root', ''),
    AccountService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new AccountService($db);
    },
    ProfileService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new ProfileService($db);
    },
    PostService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new PostService($db);
    }
];
