localStorage.clear();

let myBtnCreate = document.getElementById("creatBtn");
let myBtnUpdate = document.getElementById("updateBtn");

let idForData = 0;

myBtnCreate.addEventListener("click", saveData);
function saveData() {
  idForData += 1;
  let inputName = document.getElementById("inputName").value;
  let inputAge = document.getElementById("inputAge").value;
  let inputAddress = document.getElementById("inputAddress").value;
  let inputEmail = document.getElementById("inputEmail").value;

  // start local
  let obj = {
    id: idForData,
    name: inputName,
    age: inputAge,
    address: inputAddress,
    email: inputEmail,
  };
  localStorage.setItem(`myObj${idForData}`, JSON.stringify(obj));

  let myObjJson = localStorage.getItem(`myObj${idForData}`);
  var myObj = JSON.parse(myObjJson);
  // end local

  let myTableBody = document.querySelector("tbody");
  let mytr = document.createElement("tr");
  mytr.className = (`trClassNumber${idForData}`)
  mytr.innerHTML = `
        <td class="tdOk nameTable${idForData}">${myObj.name}</td>
        <td class="tdOk ageTable${idForData}">${myObj.age}</td>
        <td class="tdOk addressTable${idForData}">${myObj.address}</td>
        <td class="tdOk emailTable${idForData}">${myObj.email}</td>
        <td class="tdOk">
            <button id="btnDeleteNumber${myObj.id}" class="td-delete_all" onclick="delet(${myObj.id})">delete</button>
            <button id="btnEditNumber${myObj.id}" class="td-edit_all" onclick="edit(${myObj.id})">Edit</button>
        </td>
        `;
  myTableBody.appendChild(mytr);

  document.getElementById("inputName").value = "";
  document.getElementById("inputAge").value = "";
  document.getElementById("inputAddress").value = "";
  document.getElementById("inputEmail").value = "";
  
}
function delet(number) {
    document.getElementsByClassName(`trClassNumber${number}`)[0].remove();
    localStorage.removeItem(`myObj${number}`);
}
function edit(number) {
    document.querySelector("#creatBtn").style.display = "none";
    document.querySelector("#updateBtn").style.display = "block";

    
    // let mydata = JSON.parse(localStorage.getItem(`myObj${number}`))

    let myObjJson = localStorage.getItem(`myObj${number}`);
    var myObj = JSON.parse(myObjJson);
    
    document.getElementById("inputName").value = myObj.name;
    document.getElementById("inputAge").value = myObj.age;
    document.getElementById("inputAddress").value = myObj.address;
    document.getElementById("inputEmail").value = myObj.email;
    
    localStorage.setItem("number", number)
}
function update() {
    let number = localStorage.getItem("number")

    let myObjJson = localStorage.getItem(`myObj${number}`);
    var myObj = JSON.parse(myObjJson);
    
    myObj.name = document.getElementById("inputName").value;
    myObj.age = document.getElementById("inputAge").value;
    myObj.address = document.getElementById("inputAddress").value;
    myObj.email = document.getElementById("inputEmail").value;

    
    let myObjJson1 = JSON.stringify(myObj)
    localStorage.setItem(`myObj${number}`, myObjJson1);


    document.querySelector("#creatBtn").style.display = "block";
    document.querySelector("#updateBtn").style.display = "none";


    let tName = document.getElementsByClassName(`nameTable${number}`)[0];
    let tAge = document.getElementsByClassName(`ageTable${number}`)[0];
    let tAddress = document.getElementsByClassName(`addressTable${number}`)[0];
    let tEmail = document.getElementsByClassName(`emailTable${number}`)[0];
    

    tName.textContent = document.getElementById("inputName").value;
    tAge.textContent = document.getElementById("inputAge").value;
    tAddress.textContent = document.getElementById("inputAddress").value;
    tEmail.textContent = document.getElementById("inputEmail").value;


    document.getElementById("inputName").value = "";
    document.getElementById("inputAge").value = "";
    document.getElementById("inputAddress").value = "";
    document.getElementById("inputEmail").value = "";
}
