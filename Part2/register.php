<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Student Registration Form</h1>
    <form action="index.php" method="post">
        <label>Full Name:</label>
        <input type="text" name="name"><br><br>
        <label>Student ID:</label>
        <input type="number" name="sid"><br><br>

        <span>Gender:</span>
        <input type="radio" name="gender" value="Male" required>
        <label>Male</label>
        <input type="radio" name="gender" value="Female">
        <label>Female</label><br><br>

        <span>Program of study:</span>
        <select name="program">
            <option>Select Program</option>
            <option value="cs">Computer Science</option>
            <option value="eng">Engineering</option>
            <option value="Bi">Business</option>
            <option value="other">Other</option>
        </select><br><br>

        <span>Courses interested in:</span>
        <input type="checkbox" name="courses[]" value="Web dev">
        <label>Web Development</label>
        <input type="checkbox" name="courses[]" value="Dbms">
        <label>Database Management</label>
        <input type="checkbox" name="courses[]" value="Net security">
        <label>Network Security</label>
        <input type="checkbox" name="courses[]" value="Mad">
        <label>Mobile App Development</label>
        <input type="checkbox" name="courses[]" value="AI/ML">
        <label>AI/Machine Learning</label><br><br>

        <label>Age:</label>
        <input type="number" name="age"><br><br>

        <span>Year Level:</span>
        <input type="radio" name="Level" value="Freshman" required>
        <label>Freshman</label>
        <input type="radio" name="Level" value="Sophomore">
        <label>Sophomore</label>
        <input type="radio" name="Level" value="Senior" required>
        <label>Senior</label>
        <input type="radio" name="Level" value="Junior">
        <label>Junior</label><br><br>

        <label>Email:</label>
        <input type="email" name="email"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Submit"><br><br>

        
    </form>
</body>
</html>
