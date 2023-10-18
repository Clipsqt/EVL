//Add Popup animation//

let popup = document.getElementById("popup");

function openAdd(){
    popup.classList.add("open-popup");
    closeEdit();
    closeDelete();
}
function closeAdd(){
    popup.classList.remove("open-popup");
}
//Add Popup animation//

//Edit Popup animation//
let popup2 = document.getElementById("popup2");

function openEdit(){
    popup2.classList.add("open-popup2");
    closeAdd();
    closeDelete();
}
function closeEdit(){
    popup2.classList.remove("open-popup2");
}
//Edit Popup animation//

//Delete Popup animation//
let popup3 = document.getElementById("popup3");

function openDelete(){
    popup3.classList.add("open-popup3");
    closeAdd();
    closeEdit();
}
function closeDelete(){
    popup3.classList.remove("open-popup3");
}
//Delete Popup animation//