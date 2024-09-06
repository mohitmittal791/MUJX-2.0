// Quiz data
const quizData = [
    {
        question: "Which word is the odd one out?",
        options: ["Dog", "Cat", "Elephant", "Bird"],
        correct: 2
    },
    {
        question: '"Book is to reading, as a fork is to ______."',
        options: ["Eating", "Drinking", "Writing", "Cooking"],
        correct: 0
    },
    // Add more questions here...
];

// Current question index
let currentQuestion = 0;

// Display the current question
function displayQuestion() {
    const questionElement = document.getElementById('question');
    const optionsElement = document.getElementById('options');

    questionElement.textContent = quizData[currentQuestion].question;

    // Clear the options element
    optionsElement.innerHTML = '';

    // Add the options to the options element
    quizData[currentQuestion].options.forEach((option, index) => {
        const liElement = document.createElement('li');
        const inputElement = document.createElement('input');
        const labelElement = document.createElement('label');

        inputElement.type = 'radio';
        inputElement.id = `option${index}`;
        inputElement.name = 'option';

        labelElement.textContent = option;
        labelElement.htmlFor = `option${index}`;

        liElement.appendChild(inputElement);
        liElement.appendChild(labelElement);

        optionsElement.appendChild(liElement);
    });
}

// Check the user's answer
function checkAnswer() {
    const userAnswer = document.querySelector('input[name="option"]:checked').id;
    const correctAnswer = quizData[currentQuestion].correct;

    if (userAnswer === `option${correctAnswer}`) {
        alert('Correct!');
    } else {
        alert(`Incorrect. The correct answer is ${quizData[currentQuestion].options[correctAnswer]}.`);
    }

    // Move to the next question
    currentQuestion++;

    if (currentQuestion >= quizData.length) {
        currentQuestion = 0;
    }

    displayQuestion();
}

// Add event listener to the submit button
document.getElementById('submit-btn').addEventListener('click', checkAnswer);

// Display the first question
displayQuestion();