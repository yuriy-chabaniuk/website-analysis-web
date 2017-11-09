<?php
/**
 * Created by: Yuriy Chabaniuk
 */

$app->get('/report/', function (Request $request, Response $response) {
    return $this->view->render($response, 'report.php', []);
});

$app->post('/get-individual-report/', function (Request $request, Response $response) {
    return (new App\Controllers\ReportController())->getIndividualReport($request, $response);
});

$app->post('/get-competitor-report/', function (Request $request, Response $response) {
    return (new App\Controllers\ReportController())->getCompetitorReport($request, $response);
});