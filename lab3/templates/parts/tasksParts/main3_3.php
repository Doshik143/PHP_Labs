<?php
$filePath = 'words.txt';
$content = file_get_contents($filePath);
$words = preg_split('/\s+/', $content);
$words = array_filter(array_map('trim', $words));
sort($words);
$sortedContent = implode(' ', $words);
echo "<h3>Відсортовані слова:</h3>" . $sortedContent;