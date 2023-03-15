const question = [
  {
    question: "What is PHP?",
    answers: [
      { text: "PHP is an open-source programming language", correct: true },
      { text: " PHP is a server-side scripting language", correct: false },
      { text: " PHP is a server-side scripting language", correct: false },
    ],
  },
  {
    question: "Who is the father of PHP ?",
    answers: [
      { text: " Drek Kolkevi", correct: true },
      { text: "List Barely", correct: false },
      { text: " Willam Makepiece", correct: false },
    ],
  },
  {
    question:
      "Which of the following is the correct syntax to write a PHP code?",
    answers: [
      { text: "'<?php ?>'", correct: true },
      { text: "'< php >'", correct: false },
      { text: "'< ? php ?>'", correct: false },
    ],
  },
  {
    question:
      " Which of the following is the correct way to add a comment in PHP code?",
    answers: [
      { text: " '#'", correct: true },
      { text: "'//'", correct: false },
      { text: "'/* */'", correct: false },
    ],
  },
];
const color = [
  { colors:["rgb(158, 249, 228)","rgb(158, 149, 228)", "rgb(158, 49, 228)"]
},
 {colors:["rgb(242, 211, 255)","rgb(242, 111, 255)", "rgb(242, 11, 255)"]
},
{colors:[ "rgb(149, 155, 214)","rgb(115, 103, 248)", "rgb(57, 57, 228)"]
},
 {colors:["rgb(151, 184, 232)","rgb(116, 168, 247)","rgb(73, 146, 255)"]
},
];
const questionContainerElement = document.getElementById("container");
const questionText = document.getElementById("question");
const answers = document.getElementById("reponse");
const nextBtn = document.getElementById("next");
const startBtn = document.getElementById("start");
const end = document.getElementById("end");
const progress = document.getElementById("progress");
let index, score, x;

console.log(end);
startBtn.addEventListener("click", timer);
nextBtn.addEventListener("click", () => {
  index++;
  let vari= (index * 100) / (question.length - 1);
  let progresse= Math.trunc(vari);
  document.getElementById("progress").setAttribute("value", progresse);
  document.getElementById("progressName").innerText = progresse + "%";
  nextQuestion(shuffledQuestions[index])
});

function clearContainer() {
  nextBtn.classList.add("hide");
  document.getElementById("star").classList.add("hide");
  while (answers.firstChild) {
    answers.removeChild(answers.firstChild);
  }
}

function startQuiz() {
  console.log("start");
  score = 0;
  document.getElementById("progressName").innerText ="0";
  document.getElementById("timer").classList.add("hide");
  document.getElementById("progresser").innerHTML=`<progress id="progress" value="0" max="100"> </progress>`
  document.getElementById("progress").setAttribute("value", 0);
  shuffledQuestions = question.sort(() => Math.random() - 0.5);
  index = 0;
  questionContainerElement.classList.remove("hide");
  nextQuestion(shuffledQuestions[index]);
}


function nextQuestion(question) {
  clearContainer();
  shuffledColors = color.sort(() => Math.random() - 0.5);
  let colorIndex = 0;
  questionText.innerHTML = question.question;
  shuffledAnswers = question.answers.sort(() => Math.random() - 0.5);
  shuffledAnswers.forEach((answer) => {
    const button = document.createElement("button");
    button.classList.add('btn');
    button.innerHTML = answer.text;
    if (answer.correct) {
      button.dataset.correct = answer.correct;
    }
    console.log(shuffledColors[colorIndex].colors[0]);
    let colorRadial=`radial-gradient(circle at center,${shuffledColors[colorIndex].colors[0]},${shuffledColors[colorIndex].colors[1]},${shuffledColors[colorIndex].colors[2]}),100%`
    button.style.background = colorRadial
      console.log(colorRadial)
    button.addEventListener("click", Answer);
    answers.appendChild(button);
    colorIndex++;
  });
}

function Answer(e) {
  const selectedButton = e.target;
  const correct = selectedButton.dataset.correct;
  // console.log(correct);
  Array.from(answers.children).forEach((button) => {
    button.disabled = true;
    if (button.dataset.correct) {
      setStatusClass(button, button.dataset.correct);
    } else if (button != selectedButton) {
      button.style.opacity="0";
    }
  });
  setStatusClass(selectedButton, correct);
  if (correct == "true") {
    console.log("hiii");
    score++;
  }

  if (shuffledQuestions.length > index + 1) {
    next.classList.remove("hide");
  } else {
    document.getElementById("score").innerHTML = `${score}/${question.length}`;
    questionContainerElement.classList.add("hide");
    let starScor=score*(400/question.length);
    document.getElementById("filler").style.width=`${starScor}px`;
    document.getElementById("star").classList.remove("hide");
    startBtn.innerText="restart";
    startBtn.classList.remove("hide");
  }
}

function setStatusClass(element, correct) {
  if (correct) {
    element.style.background = "#B6FFCE";
  } else {
    element.style.background = "#FF8C8C";
  }
}

function clearStatusClass(element) {
  element.style.background = "#ffffff";
}

function timer() {
  document.getElementById("timer").classList.remove("hide");
  var counter = 5;
  // Update the count down every 1 second

  var y = setInterval(function () {
    counter--;
    document.getElementById("timer").innerHTML = counter;

    // If the count down is over, write some text
    if (counter == 0) {
      clearInterval(y);
    }
  }, 1000);
  if(progress){
  progress.remove();
  }
  document.getElementById("progressName").innerText ="";
  document.getElementById("score").innerHTML = ``;
  startBtn.classList.add("hide");
  document.getElementById("best").classList.add("hide");
      clearContainer()
  setTimeout(startQuiz, 5000);

}
