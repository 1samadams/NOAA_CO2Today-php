<?php
header('Content-Type: application/json');

$dataUrl = 'https://gml.noaa.gov/aftp/data/trace_gases/co2/in-situ/surface/txt/co2_mlo_surface-insitu_1_ccgg_DailyData.txt';

try {
    $data = file_get_contents($dataUrl);
    if ($data === FALSE) {
        throw new Exception('Error fetching data.');
    }
    echo json_encode(['data' => $data]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
