<?php

$header = <<<HEADER
This file is part of holistic-agency/decouple.

(c) JamesRezo <james@rezo.net>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
HEADER;

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__ . '/src', __DIR__ . '/tests'])
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PER-CS3.0:risky' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
        'header_comment' => ['header' => $header],
    ])
    ->setFinder($finder)
;
