'use strict'

//// SELECTORS ////
const newTaskForm = document.getElementById('newTaskForm');
const newTaskNameField = document.getElementById('newTaskName');
const errorMessage = document.getElementById('errorMessage');

const content = document.getElementsByClassName('list');
const checkButton = document.getElementsByClassName('checkButton');
const taskName = document.getElementsByClassName('taskName');

//// EVENTS ////
for (let i = 0; i < checkButton.length; i++) {
    checkButton[i].addEventListener("click", function () {

        taskName[i].classList.toggle("taskChecked");
        checkButton[i].classList.toggle("buttonNotChecked");
        checkButton[i].classList.toggle("buttonChecked");

        if (checkButton[i].classList[1] !== "buttonChecked") {
            checkButton[i].innerHTML = '<i class="fas fa-check"></i>';
        } else {
            checkButton[i].innerHTML = '<i class="fas fa-times"></i>';
        }

    });
}

newTaskForm.addEventListener("submit", fieldControl);

//// FUNCTIONS ////
function fieldControl(e) {

    if (newTaskNameField.value === '') {
        e.preventDefault();
        errorMessage.innerHTML = "Veuillez remplir le champ";
    } else {
        errorMessage.innerHTML = "";
    }

}