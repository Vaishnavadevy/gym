<?php
$pages = [
    ["title" => "About Us", "url" => "about-us.html"],
    ["title" => "Class Timetable", "url" => "class-timetable.html"],
    ["title" => "Blog", "url" => "blog.html"],
    ["title" => "Contact", "url" => "contact.html"],
    ["title" => "Home", "url" => "index.html"],
    // Add more pages as needed
];

if (isset($_GET['q'])) {
    $query = strtolower(trim($_GET['q']));
    $results = [];

    foreach ($pages as $page) {
        if (strpos(strtolower($page["title"]), $query) !== false) {
            $results[] = $page;
        }
    }

    if (count($results) > 0) {
        foreach ($results as $res) {
            echo "<div style='padding: 5px;'><a href='" . $res['url'] . "' style='color: #007bff; text-decoration: none;'>" . $res['title'] . "</a></div>";
        }
    } else {
        echo "<div>No matching pages found.</div>";
    }
}
?>
