<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DragonBall-M</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to DragonBall</h1>
    </header>
    <main>
        <h3>Train yourself with Dragon Ball friends! Math Practice</h3>
        <button id="start-training" onclick="startTraining()">Click Me to Start the Training</button> <!-- click button: start mathe and background music -->
        <button onclick="toggleMusic()">Toggle Background Music</button> <!-- New button to toggle music -->
        <form>
            <label for="score">Your point:</label>
            <input type="text" id="score" name="score"><br>
        </form>

        <!-- Math Practice Section -->
        <section id="math-practice" style="display: none;">
            
            <?php include "Mathe.php";?>
            <!-- Form for the random question -->
        <form method="post" action="">
        <!-- Displaying question and answer options fetched from PHP -->
        <div id="question">
            <p><?php echo $row['ID'] . "]. " . htmlspecialchars($row['Question']); ?></p>
            <input type="hidden" name="question_id" value="<?php echo $row['ID']; ?>">
            <input type="radio" id="choice1" name="choice" value="<?php echo htmlspecialchars($row['Choice1']); ?>"> A. <?php echo htmlspecialchars($row['Choice1']); ?><br>
            <input type="radio" id="choice2" name="choice" value="<?php echo htmlspecialchars($row['Choice2']); ?>"> B. <?php echo htmlspecialchars($row['Choice2']); ?><br>
            <input type="radio" id="choice3" name="choice" value="<?php echo htmlspecialchars($row['Choice3']); ?>"> C. <?php echo htmlspecialchars($row['Choice3']); ?><br>
            <input type="radio" id="choice4" name="choice" value="<?php echo htmlspecialchars($row['Choice4']); ?>"> D. <?php echo htmlspecialchars($row['Choice4']); ?><br>
        </div>    
        <!-- Pass the correct answer to the JavaScript function on button click -->
        <button type="button" onclick="checkAnswer('<?php echo $row['Answer']; ?>')">Submit</button>
        <button type="button" onclick="loadNewQuestion()">New Question</button> 
        </form>

        </section>
        <div id="AntR-container" style="display: none;">
            <div class="talk-bubble">Very Good, Well Done!</div>
            <img id="AntR" src="AntR.png" alt="AntR">
        </div>

        <div id="AntF-container" style="display: block;">
            <div class="talk-bubble">Oops, what was wrong~ </div>
            <img id="AntF" src="AntF.png" alt="AntF">
        </div>
        
        <div id="Ball-container" style="display: block;">
            <img class= "Ball" id="Ball1" src="Ball1.jpg" alt="Ball1">
            <img class= "Ball" id="Ball2" src="Ball2.jpg" alt="Ball2">
            <img class= "Ball" id="Ball3" src="Ball3.jpg" alt="Ball3">
            <img class= "Ball" id="Ball4" src="Ball4.jpg" alt="Ball4">
            <img class= "Ball" id="Ball5" src="Ball5.jpg" alt="Ball5">
            <img class= "Ball" id="Ball6" src="Ball6.jpg" alt="Ball6">
            <img class= "Ball" id="Ball7" src="Ball7.jpg" alt="Ball7">
        </div>
        

    </main>

    

    <svg>
        <path id="flying-path" d="M 1000 50 C 1200 100, 1200 300, 700 500" fill="transparent"/>
    </svg>

    <img id="KidGoku" src="KidGoku.png" alt="KidGoku" onclick="playKidGokuHallo()">

    <!-- Autoplay and loop attributes for continuous music playback -->
    <audio id="background_music" src="background_music.mp3" loop></audio>
    <audio id="kidGokuHallo" src="Kid Goku Hello.wav"></audio>
    <audio id="wellDone" src="Kid Goku Well Done.wav"></audio>
    <audio id="Krillin" src="Krillin Wrong.wav"></audio>
    <script src="script.js"></script>
</body>
</html>