<?php
// Database connection settings (same database used by the job application form).
$host = 'localhost';
$dbname = 'job_application_db';
$dbuser = 'root';
$dbpass = ''; // Enter your MySQL password if you have one.

$applicants = [];
$error = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $dbuser,
        $dbpass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // Fetch all applicant records. Passwords are intentionally not displayed.
    $stmt = $pdo->query(
        'SELECT name, email, mobile, username
         FROM applicants
         ORDER BY id DESC'
    );
    $applicants = $stmt->fetchAll();

} catch (PDOException $e) {
    $error = 'Unable to connect to the database or fetch applicant details. '
           . 'Please check the database settings and make sure database.sql has been imported.';
}

// Escape values before displaying them in HTML.
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
    <style>
        body {
            margin: 0;
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            color: #222;
        }

        .container {
            max-width: 950px;
            margin: 0 auto;
            padding: 25px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #2867a8;
            color: white;
        }

        tr:nth-child(even) {
            background: #f5f5f5;
        }

        .message {
            padding: 12px;
            background: #fff3cd;
            border: 1px solid #e3cf8a;
            border-radius: 4px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            th, td {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>Applicant Details</h1>

        <?php if ($error !== ''): ?>
            <p class="message"><?= e($error) ?></p>
        <?php elseif (count($applicants) > 0): ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applicants as $applicant): ?>
                            <tr>
                                <td><?= e($applicant['name']) ?></td>
                                <td><?= e($applicant['email']) ?></td>
                                <td><?= e($applicant['mobile']) ?></td>
                                <td><?= e($applicant['username']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="message">No applicant records found in the database.</p>
        <?php endif; ?>
    </main>
</body>
</html>
