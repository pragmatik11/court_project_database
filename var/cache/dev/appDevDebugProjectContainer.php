<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container3p856q1\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container3p856q1/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/Container3p856q1.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\Container3p856q1\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \Container3p856q1\appDevDebugProjectContainer([
    'container.build_hash' => '3p856q1',
    'container.build_id' => 'd3a4f349',
    'container.build_time' => 1567412998,
], __DIR__.\DIRECTORY_SEPARATOR.'Container3p856q1');