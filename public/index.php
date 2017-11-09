<?php
/**
 * Created by: Yuriy Chabaniuk
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use App\Core\TwigExtension\AssetExtension;

define('ROOT_FOLDER', __DIR__ . '/../');
define('PUBLIC_FOLDER', __DIR__);

require 'vendor/autoload.php';

// work around for assets.
$pathInfo = $_SERVER['REQUEST_URI'];
if (strpos($pathInfo, '/assets/') === 0) {
    $file = PUBLIC_FOLDER . "{$pathInfo}";

    if (is_readable($file)) {
        echo file_get_contents($file);

        return;
    }

    return '';
}

$app = new \Slim\App;
$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(ROOT_FOLDER . '/resources/views/', [
        'cache' => ROOT_FOLDER . '/resources/view-cache/'
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

$app->get('/report/', function (Request $request, Response $response) {
    return $this->view->render($response, 'report.php', []);
});

$app->post('/get-individual-report/', function (Request $request, Response $response) {
    return (new App\Controllers\ReportController())->getIndividualReport($request, $response);
});

$app->post('/get-competitor-report/', function (Request $request, Response $response) {
    return (new App\Controllers\ReportController())->getCompetitorReport($request, $response);
});

$app->run();