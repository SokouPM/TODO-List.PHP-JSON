'use strict'

//// SELECTORS ////
const checkButton = document.getElementsByClassName('checkButton');
const taskName = document.getElementsByClassName('taskName');
const newTaskForm = document.getElementById('newTaskForm');
const content = document.getElementsByClassName('list');

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