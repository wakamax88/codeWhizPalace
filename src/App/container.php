<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database, Container};
use App\Config\Paths;
use App\Services\{ValidatorService, AccountService, CategoryService, DiscussionService, LinkService, MailService, ProfileService, PostService, SanitizeService, SettingService};

return [
    TemplateEngine::class => fn () => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService(),
    SanitizeService::class => fn () => new SanitizeService(),
    Database::class => fn () => new Database('mysql', ['host' => $_ENV['DB_HOST'], 'port' => $_ENV['DB_PORT'], 'dbname' => $_ENV['DB_NAME']], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']),
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
    },
    CategoryService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new CategoryService($db);
    },
    DiscussionService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new DiscussionService($db);
    },
    LinkService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new LinkService($db);
    },
    SettingService::class => function (Container $container) {
        $db = $container->get(Database::class);
        return new SettingService($db);
    }
];
