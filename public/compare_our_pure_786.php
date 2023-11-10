<?php
// Comparing Title and prices of our current products in db with listing on puresafety
$servername = "localhost";
$username = "ooc_live";
$password = '$ev%i^*L0#';
$database = "ooc_live_db";

try {
    $conn = new PDO("mysql:host={$servername};dbname={$database}", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM products WHERE course_id IS NOT NULL and id > 99;");
    $stmt->execute();
    $all_courses_from_db = $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://oshaoutreachcourses.puresafety.com/OnDemand/Home/GetPurchaseableTrainings/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"start\"\r\n\r\n0\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"limit\"\r\n\r\n1400\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sort\"\r\n\r\nTitle\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"dir\"\r\n\r\nASC\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"query\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"trainingTypeIDs\"\r\n\r\n79,80,81,84,85,86,97,98,289,290,291,440\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"categoryIDs\"\r\n\r\n0\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"languageIDs\"\r\n\r\n-1\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"showAll\"\r\n\r\n true\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"showSelfAssignOnly\"\r\n\r\nfalse\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
    CURLOPT_HTTPHEADER => array(
        "Postman-Token: ee97fa8e-0511-4d34-96ee-891498fdf20f",
        "cache-control: no-cache",
        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
    ),
));

$response = curl_exec($curl);
$all_courses_from_json = json_decode($response);
$err = curl_error($curl);

curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }


function sort_ascending($a, $b)
{
    if ($a['course_id'] > $b['course_id']) {
        return 1;
    } else if ($a['course_id'] < $b['course_id']) {
        return -1;
    }
    return 0;
}

// $all_courses_from_json = json_decode(file_get_contents('all_courses.json'));
// echo "<pre>";
// print_r($all_courses_from_json);die();
// echo "</pre>";
// set the resulting array to associative
$filtered_db_courses = [];
foreach ($stmt->fetchAll() as $k => $db_course) {
    $filtered_db_courses[$db_course['course_id']] = [
        'id' => $db_course['id'],
        'title' => $db_course['title'],
        'price' => $db_course['price'],
    ];
}
// echo "<pre>";
// print_r($filtered_db_courses);die();
// echo "</pre>";

$changed_courses = [];
$all_training_ids_in_library = [];
$courses_not_found_on_website = [];
foreach ($all_courses_from_json->list as $course) {
    $all_training_ids_in_library[] = $course->TrainingID;
    if (key_exists($course->TrainingID, $filtered_db_courses)) {
        if ($filtered_db_courses[$course->TrainingID]['title'] != $course->Title) {
            $changed_courses['title'][] = [
                'course_id' => $filtered_db_courses[$course->TrainingID]['id'],
                'training_id' => $course->TrainingID,
                'current_title' => $filtered_db_courses[$course->TrainingID]['title'],
                'updated_title' => $course->Title,
            ];
        }
        if ($filtered_db_courses[$course->TrainingID]['price'] != $course->Pricing) {
            $changed_courses['price'][] = [
                'course_id' => $filtered_db_courses[$course->TrainingID]['id'],
                'training_id' => $course->TrainingID,
                'current_price' => $filtered_db_courses[$course->TrainingID]['price'],
                'updated_price' => $course->Pricing
            ];
        }
    } else {
        $courses_not_found_on_website[$course->TrainingID] = [
            'id' => $course->TrainingID,
            'title' => $course->Title,
            'price' => $course->Pricing,
        ];
    }
}

echo "<br/>";
echo "<br/>";
echo "<h2> New Courses: " . count($courses_not_found_on_website) . " courses</h2>";
echo "<table border='1' cellspacing='0' cellpadding='1'>";
echo "<tr>";
echo "<th>Course ID</th>";
echo "<th>Title</th>";
echo "<th>Price</th>";
echo "</tr>";
foreach ($courses_not_found_on_website as $course) {
    echo "<tr>";
    echo "<td>{$course['id']}</td>";
    echo "<td>{$course['title']}</td>";
    echo "<td>{$course['price']}</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br/>";

echo "<h2>Courses Not Found in Library</h2>";
echo "SELECT * FROM products WHERE course_id NOT IN (" . implode(',', $all_training_ids_in_library) . ");";

echo "<br/>";


if (isset($changed_courses['title'])) {
    echo "<h2> Title Changed in " . count($changed_courses['title']) . " courses</h2>";

    usort($changed_courses['title'], "sort_ascending");

    echo "<table border='1' cellspacing='0' cellpadding='1'>";
    echo "<tr>";
    echo "<th>Course ID</th>";
    echo "<th>Training ID</th>";
    echo "<th>Current</th>";
    echo "<th>Updated</th>";
    echo "</tr>";
    foreach ($changed_courses['title'] as $cc) {
        if (in_array($cc['course_id'], [100, 104, 105, 106, 110, 114, 119, 137, 158, 160, 174, 176, 177, 200, 201, 240, 289, 312, 337, 338, 399, 403, 428, 434, 459, 494, 496, 501, 503, 521, 536, 540, 605, 607, 617, 640, 642, 644, 1501, 1502, 2169, 2261])) {
            echo "<tr style='background-color: #ffff0099;'>";
        } else {
            echo "<tr>";
        }
        echo "<td>" . $cc['course_id'] . "</td>";
        echo "<td>" . $cc['training_id'] . "</td>";
        echo "<td>" . $cc['current_title'] . "</td>";
        echo "<td>" . $cc['updated_title'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($changed_courses['price'])) {
    echo "<h2> Price Changed in " . count($changed_courses['price']) . " courses</h2>";

    usort($changed_courses['price'], "sort_ascending");

    echo "<table border='1' cellspacing='0' cellpadding='1'>";
    echo "<tr>";
    echo "<th>Course ID</th>";
    echo "<th>Training ID</th>";
    echo "<th>Current</th>";
    echo "<th>Updated</th>";
    echo "</tr>";
    foreach ($changed_courses['price'] as $cc) {
        echo "<tr>";
        echo "<td>" . $cc['course_id'] . "</td>";
        echo "<td>" . $cc['training_id'] . "</td>";
        echo "<td>" . $cc['current_price'] . "</td>";
        echo "<td>" . $cc['updated_price'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    foreach ($changed_courses['price'] as $cc) {
        echo "UPDATE products SET price = " . $cc['updated_price'] . " WHERE id = " . $cc['course_id'] . " AND course_id = " . $cc['training_id'] . ";<br/>";
    }
}
