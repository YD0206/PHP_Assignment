<?php
$students = [
    ["name" => "Darshan", "age" => "22", "program" => "cse", "courses" => ["PHP", "SQL"]],
    ["name" => "Yashas", "age" => "20", "program" => "cit", "courses" => ["Angular", "Java"]],
    ["name" => "Likhith", "age" => "22", "program" => "ece", "courses" => ["C++", "Node.js"]],
    ["name" => "Arjun", "age" => "21", "program" => "eee", "courses" => ["css", "js"]],
    ["name" => "Nishanth", "age" => "24", "program" => "aiml", "courses" => ["Python", "SQL"]]
];

if(isset($_GET["search"])) {
    $searchName = strtolower($_GET["name"] ?? '');
    $searchProgram = strtolower($_GET["program"] ?? '');
    $searchCourse = strtolower($_GET["course"] ?? '');

    $filteredStudents = [];
    foreach($students as $student) {
        if(
            (empty($searchName) || strpos(strtolower($student["name"]), $searchName) !== false) &&
            (empty($searchProgram) || strpos(strtolower($student["program"]), $searchProgram) !== false) &&
            (empty($searchCourse) || in_array($searchCourse, array_map('strtolower', $student["courses"])))
        ) {
            $filteredStudents[] = $student;
        }
    }
    $students = $filteredStudents;
}

if(isset($_GET["sort"])) {
    $sortBy = $_GET["sort"];
    usort($students, function($a, $b) use ($sortBy) {
        return strcmp($a[$sortBy], $b[$sortBy]);
    });
}

$perPage = 10;
$totalStudents = count($students);
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$start = ($page - 1) * $perPage;
$studentsToShow = array_slice($students, $start, $perPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="name" placeholder="Search by name">
        <input type="text" name="program" placeholder="Search by program">
        <input type="text" name="course" placeholder="Search by course">
        <button type="submit" name="search">Search</button>
    </form>

    <table border="1">
        <tr>
            <th><a href="?sort=name">Name</a></th>
            <th><a href="?sort=age">Age</a></th>
            <th><a href="?sort=program">Program</a></th>
            <th>Courses</th>
        </tr>
        <?php foreach ($studentsToShow as $student): ?>
        <tr>
            <td><?php echo $student["name"]; ?></td>
            <td><?php echo $student["age"]; ?></td>
            <td><?php echo $student["program"]; ?></td>
            <td><?php echo implode(", ", $student["courses"]); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($totalStudents > $perPage): ?>
    <div>
        <?php for ($i = 1; $i <= ceil($totalStudents / $perPage); $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</body>
</html>