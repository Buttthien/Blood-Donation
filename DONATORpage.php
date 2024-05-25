<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .table {
            margin-bottom: 0;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
            padding: 15px;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
    </style>
    <title>Donator Information</title>
</head>
<body>
    <div class="container table-container">
        <?php
        // Database connection parameters
        $servername = "localhost"; // Change if using a different server
        $username = "root"; // Change to your database username
        $password = ""; // Change to your database password
        $dbname = "donations1";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the citizenship ID from the query parameter
        $citizenshipID = isset($_GET['citizenshipID']) ? $_GET['citizenshipID'] : '';

        if (!empty($citizenshipID)) {
            // Prepare and bind
            $stmt = $conn->prepare("SELECT name, age, city, bloodDonated FROM donators1 WHERE citizenshipID = ?");
            $stmt->bind_param("s", $citizenshipID);

            // Execute statement
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($name, $age, $city, $bloodDonated);

            // Fetch values
            if ($stmt->fetch()) {
                echo '<div class="card">';
                echo '<div class="card-header">Donator Information</div>';
                echo '<div class="card-body">';
                echo '<table class="table table-bordered">';
                echo '<thead><tr><th scope="col">Name</th><th scope="col">Age</th><th scope="col">City</th><th scope="col">Blood Donated (liters)</th></tr></thead><tbody>';
                echo '<tr><td>' . htmlspecialchars($name) . '</td><td>' . htmlspecialchars($age) . '</td><td>' . htmlspecialchars($city) . '</td><td>' . htmlspecialchars($bloodDonated) . '</td></tr>';
                echo '</tbody></table>';
                echo '</div></div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">No information found for the provided Citizenship ID.</div>';
            }

            // Close statement
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid Citizenship ID.</div>';
        }

        // Close connection
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS for better visual appeal and responsive behavior -->
    <script>
        document.getElementById('citizenshipForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Fetch information based on the entered citizenship ID
            var citizenshipID = document.getElementById('citizenshipID').value;
            // Here, you can use AJAX to send a request to the server to fetch the information based on the citizenship ID
            // For demonstration, let's assume you have fetched the information and stored it in a variable called 'data'
    
            // Dummy data for demonstration
            var data = {
                name: 'John Doe',
                age: 35,
                city: 'New York'
            };
    
            // Construct HTML for the table
            var tableHTML = '<table class="table"><thead><tr><th scope="col">Name</th><th scope="col">Age</th><th scope="col">City</th></tr></thead><tbody>';
            tableHTML += '<tr><td>' + data.name + '</td><td>' + data.age + '</td><td>' + data.city + '</td></tr>';
            tableHTML += '</tbody></table>';
    
            // Display the table
            document.getElementById('infoTable').innerHTML = tableHTML;
            document.getElementById('infoTable').style.display = 'block';
    
            // You can also handle error cases and display appropriate messages if the data is not found or if there's an error in fetching the data
        });
    </script>
</body>
</html>
