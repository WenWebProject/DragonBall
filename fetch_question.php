<?php
// Connect to the MySQL database
$host = "localhost";
$username = "root";
$password = "";
$database = "test";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch one random question from the matheqa table
$sql = "SELECT * FROM matheqa ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <div id="question">
        <p><?php echo $row['ID'] . "]. " . htmlspecialchars($row['Question']); ?></p>
        <input type="radio" id="choice1" name="choice" value="<?php echo htmlspecialchars($row['Choice1']); ?>"> A. <?php echo htmlspecialchars($row['Choice1']); ?><br>
        <input type="radio" id="choice2" name="choice" value="<?php echo htmlspecialchars($row['Choice2']); ?>"> B. <?php echo htmlspecialchars($row['Choice2']); ?><br>
        <input type="radio" id="choice3" name="choice" value="<?php echo htmlspecialchars($row['Choice3']); ?>"> C. <?php echo htmlspecialchars($row['Choice3']); ?><br>
        <input type="radio" id="choice4" name="choice" value="<?php echo htmlspecialchars($row['Choice4']); ?>"> D. <?php echo htmlspecialchars($row['Choice4']); ?><br>
    </div>
    <button type="button" onclick="checkAnswer('<?php echo $row['Answer']; ?>')">Submit</button>
    <button type="button" onclick="loadNewQuestion()">New Question</button>
    <?php
} else {
    echo "No questions found.";
}

$conn->close();
?>
