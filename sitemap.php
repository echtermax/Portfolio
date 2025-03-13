<?php
header("Content-type: text/xml");
$base_url = "https://www.maxpawellek.de";

$pages = [
    ["url" => "", "lastmod" => "2025-03-13", "changefreq" => "weekly", "priority" => "1.0"],
];

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach ($pages as $page) {
    echo "<url>";
        echo "<loc>{$base_url}{$page['url']}</loc>";
        echo "<lastmod>{$page['lastmod']}</lastmod>";
        echo "<changefreq>{$page['changefreq']}</changefreq>";
        echo "<priority>{$page['priority']}</priority>";
    echo "</url>";
}

echo '</urlset>';