<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $sid = trim($_POST["sid"]);
    $age = trim($_POST["age"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $courses = isset($_POST["courses"]) ? $_POST["courses"] : [];
    $program = trim($_POST["program"]);
    $level = isset($_POST["Level"]) ? $_POST["Level"] : "";
    $errors = [];

    if (empty($name) || !preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Incorrect name.";
    }
    if (!ctype_digit($sid) || strlen($sid) != 8) {
        $errors[] = "Incorrect student ID.";
    }
    if (!ctype_digit($age) || $age < 18 || $age > 60) {
        $errors[] = "Not eligible age.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Incorrect email format.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password size too low.";
    }
    if (empty($gender)) {
        $errors[] = "Select gender.";
    }
    if (empty($program)) {
        $errors[] = "Select program.";
    }
    if (empty($courses)) {
        $errors[] = "Select at least one course.";
    }
    if (empty($level)) {
        $errors[] = "Select level.";
    }

    if (count($errors) > 0) {
        echo "<h3>Errors:</h3>";
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        exit;
    }

    $scholorship_eligibility = ($age < 25 && count($courses) >= 3) ? "Eligible" : "Not Eligible";
    $advanced_eligibilty = ($program == "Computer Science" || $program == "Engineering")
        && in_array("AI/Machine Learning", $courses) ? "Eligible" : "Not Eligible";

    switch ($program) {
        case "Computer Science":
            $advisor = "Dr. James Smith";
            break;
        case "Engineering":
            $advisor = "Dr. Maria Rodriguez";
            break;
        case "Business":
            $advisor = "Dr. Robert Johnson";
            break;
        default:
            $advisor = "Dr. Academic Advising Center";
            break;
    }

    $welcome_message = "";
    switch ($level) {
        case "Freshman":
            $welcome_message = "Welcome Freshman";
            break;
        case "Sophomore":
            $welcome_message = "Welcome Sophomore";
            break;
        case "Junior":
            $welcome_message = "Welcome Junior";
            break;
        case "Senior":
            $welcome_message = "Welcome Senior";
            break;
    }

    echo "<strong>Program of study:</strong> $program<br>";
    if (!empty($courses)) {
        echo "<strong>Courses Selected:</strong> " . implode(", ", $courses) . "<br>";
    } else {
        echo "<strong>Courses Selected:</strong> None<br>";
    }
    echo "<strong>Year level:</strong> $level<br>";
    echo "<strong>Scholarship eligibility:</strong> $scholorship_eligibility<br>";
    echo "<strong>Advanced eligibility:</strong> $advanced_eligibilty<br>";
    echo "<strong>Faculty advisor:</strong> $advisor<br>";
    echo "<strong>Welcome message:</strong> $welcome_message<br>";
}
?>