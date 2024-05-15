<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Information Form</title>
</head>

<body>
    <h2>Donor Information</h2>
    <form method="POST" action="process_form.php">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
