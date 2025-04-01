<title>CheckPageStatus</title>
<link rel="stylesheet" href="/templates/styles/style.css">
<?php
require __DIR__ . '/../t6/traffic_logger.php';
function get_http_status($url) {
    $headers = get_headers($url, 1);
    return intval(substr($headers[0], 9, 3));
}

function fetch_page_content($url) {
    ob_start();
    $content = file_get_contents($url);
    if ($content === false) {
        ob_end_clean();
        return false;
    }
    echo $content;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

function cache_page($url, $cache_file = 'cache.html') {
    $status = get_http_status($url);

    if ($status === 404) {
        if (file_exists($cache_file)) {
            unlink($cache_file);
        }
        echo "Сторінка не знайдена (404)";
        return;
    }

    if (file_exists($cache_file)) {
        echo file_get_contents($cache_file);
        return;
    }

    if ($status === 200) {
        $content = fetch_page_content($url);

        if ($content !== false) {
            file_put_contents($cache_file, $content);
            echo $content;
        } else {
            echo "Помилка при отриманні вмісту сторінки";
        }
    } else {
        echo "Невідомий статус: $status";
    }
}

$page_url = 'https://example.com/page-to-cache';
cache_page($page_url);