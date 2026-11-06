<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/AffirmationRepository.php';
require_once __DIR__ . '/../src/McpServer.php';

use AffirmationsMcp\AffirmationRepository;
use AffirmationsMcp\McpServer;

$expectedToken = getenv('AFFIRMATIONS_MCP_API_TOKEN') ?: 'change-me';
$tokenHeaderName = getenv('AFFIRMATIONS_MCP_TOKEN_HEADER') ?: 'X-Affirmations-MCP-Token';
$repository = new AffirmationRepository();
$server = new McpServer($expectedToken, $tokenHeaderName, $repository);
$server->handleHttpRequest();
