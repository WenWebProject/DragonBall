// Play Kid Goku's voice when click him
function playKidGokuHallo() {
    const audio = document.getElementById('kidGokuHallo');
    audio.play().catch(error => {
        console.error('Error playing audio:', error);
    });
}

// When the page loads, start Kid Goku's animation
document.addEventListener('DOMContentLoaded', (event) => {
    const KidGoku = document.getElementById('KidGoku');
    const path = document.getElementById('flying-path');
    const pathLength = path.getTotalLength();

    // Add click event listener to Kid Goku
    KidGoku.addEventListener('click', playKidGokuHallo);
    
    // Position Kid Goku at the start point
    const startPoint = path.getPointAtLength(0);
    KidGoku.style.left = `${startPoint.x}px`;
    KidGoku.style.top = `${startPoint.y}px`;

    let startTime;

    function animate(time) {
        if (!startTime) startTime = time;
        const elapsed = time - startTime;

        const progress = Math.min(elapsed / 5000, 1); // 5 seconds animation
        const point = path.getPointAtLength(progress * pathLength);

        KidGoku.style.left = `${point.x}px`;
        KidGoku.style.top = `${point.y}px`;

        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            KidGoku.style.animation = 'surf 2s infinite alternate'; // Trigger the surf animation
            document.getElementById('KidGokuTalk').style.display = 'block';
            
        }
    }

    requestAnimationFrame(animate);
});

// Toggle background music
function toggleMusic() {
    const music = document.getElementById('background_music');
    if (music.paused) {
        music.play();
    } else {
        music.pause();
    }
}

// Start the training process
function startTraining() {
    //Start playing the background music
    const music = document.getElementById('background_music');
    music.play();

    // Show the math practice section when training starts
    document.getElementById('math-practice').style.display = 'block';
    generateProblem(); // Generate the first math problem
    
}

// Generate a new math problem
let correctAnswer;
function generateProblem() {
    const num1 = Math.floor(Math.random() * 10) + 1;
    const num2 = Math.floor(Math.random() * 10) + 1;
    correctAnswer = num1 + num2;
    document.getElementById('problem').innerText = `${num1} + ${num2} = ?`;
}

// Check if the user's answer is correct
function checkAnswer() {
    const userAnswer = parseInt(document.getElementById('answer').value);
    
    // Provide feedback and generate a new problem
    if (userAnswer === correctAnswer) {
        // Show the AntR Talk when answer is correct
        document.getElementById('AntR-container').style.display = 'block';
        document.getElementById('AntF-container').style.display = 'none';
        document.getElementById('wellDone').play(); // Play Kid Goku's voice when the answer is correct
    } else {
        // Show the AntF Talk when answer is wrong
        document.getElementById('AntF-container').style.display = 'block';
        document.getElementById('AntR-container').style.display = 'none';
        document.getElementById('Krillin').play(); // Play Krillin's voice when the answer is wrong
        
    }
    document.getElementById('answer').value = ''; // Clear the input after checking
    generateProblem(); // Generate a new problem after checking the answer
}

function speakMessage(message) {
    const utterance = new SpeechSynthesisUtterance(message);
    utterance.lang = 'de-DE'; // Set the language to German
    window.speechSynthesis.speak(utterance);
}