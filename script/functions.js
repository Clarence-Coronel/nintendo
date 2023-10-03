let container = document.getElementById("gameContainer");
let inputColor = document.getElementsByClassName("input");
let avail = document.getElementById("availability");
let titleContainer = document.getElementsByClassName('gameTitle-container')[0];
let proceed = false;
let titleStatus;
let drop = document.getElementById("drop");
let isImageUploaded = false;
const modalTrigger = document.getElementById('modal-trigger');
let isValid = false;
// // let drop = document.getElementById("drop");
// // let proceed;
// // alert(isOnlyChar('NO NUMBER'));

// function foc(){
//   const search = document.querySelector('#search-box').value;

//   if(search.length != 0){
//     const dis = document.querySelector('.drop');
//     dis.style.display = 'flex';
//   }
  
// }

// // function hide(){
// //   setTimeout(()=> {
// //     const dis = document.querySelector('.drop');
// //     dis.style.display = 'none';
// //   },100);
  
// }


for(color of inputColor){
  color.style.backgroundColor = '#333131';
}

preview();

function preview(){
  const poster = document.querySelector('#poster');
  const prev = document.querySelector('#image-prev');
  const start = document.querySelector('#start');
  let image = '';

  poster.addEventListener('change', function(){

    isImageUploaded = true;
    start.style = 'display:none';
    const filter = document.getElementById('cover');

    prev.addEventListener('mouseover', ()=>{
        filter.style = 'display:flex';
    })

    prev.addEventListener('mouseout', ()=>{
      filter.style = 'display:none';
  })

    const reader = new FileReader();
    reader.addEventListener('load', () =>{
      image =  reader.result;
      prev.style.backgroundImage = `url(${image})`; 
    });
    reader.readAsDataURL(this.files[0]);
  })

  poster.style = 'display:none'
}



function posterInput(){
  const poster = document.querySelector('#poster');
  const prev = document.getElementById('image-prev');
  prev.style.border = 'none';
  poster.click();
}


function loadData(){
    // drop.style = "display:none;";
    http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if(http.readyState == 4 && http.status == 200){
            container.innerHTML = (http.responseText);
        }
    }
    http.open("GET", "pages/obtain.php", true);
    http.send();
}

function highlight(e){
  let target = document.getElementById(e);
  target.parentNode.style.backgroundColor = '#292727';
  target.parentNode.style = "border: 2px solid white";

}

function exitHighlight(e){
  let target = document.getElementById(e);
  target.parentNode.style = "border: 2px solid none";
  target.parentNode.style = "background-color: #333131";
}

function highlightG(e){
  let gameTitle = document.getElementById("gameTitle").value;
  let target = document.getElementById(e);

  if(gameTitle.length == 0 || gameTitle[0] == ' '){
    target.parentNode.style.backgroundColor = '#292727';
    target.parentNode.style = "border: 2px solid white";
  }
}

function exitHighlightG(e){
  let gameTitle = document.getElementById("gameTitle").value;
  let target = document.getElementById(e);
  if(gameTitle.length != 0 && gameTitle[0] != ' '){
    target.parentNode.style = "border: 2px solid none";
    target.parentNode.style = "background-color: #333131";
  }
  if(!proceed){
    avail.innerHTML = "The game \"" + gameTitle + "\" already exist";
    titleContainer.style = 'border: 2px solid #F05B5C';
  }else if(titleStatus == 1){
    avail.innerHTML = "Minimum allowed characters is 5";
    titleContainer.style = 'border: 2px solid #F05B5C;'
    avail.setAttribute("class", "notAvail");
  }else if(titleStatus == 2){
    avail.innerHTML = "Maximum allowed characters is 30";
    titleContainer.style = 'border: 2px solid #F05B5C;'
    avail.setAttribute("class", "notAvail");
  }else{
    avail.innerHTML = "";
    titleContainer.style = 'border: none';
    titleContainer.style = 'background-color: #333131'
  }
}

function check(){
  let gameTitle = document.getElementById("gameTitle").value;
  gameTitle = gameTitle.trim();

  if(gameTitle.length != 0 && gameTitle.length < 5) {
    avail.innerHTML = "Minimum allowed characters is 5";
    titleContainer.style = 'border: 2px solid #F05B5C;'
    avail.setAttribute("class", "notAvail");
    titleStatus = 1;
    return;
  }else if(gameTitle.length > 30){
    avail.innerHTML = "Maximum allowed characters is 30";
    titleContainer.style = 'border: 2px solid #F05B5C;'
    avail.setAttribute("class", "notAvail");
    titleStatus = 2;
    return;
  }

  titleStatus = 0;

  if(gameTitle.length != 0){
      
      let http = new XMLHttpRequest();

       http.onreadystatechange = function(){
          if(http.readyState == 4 && http.status == 200){

              if(http.responseText == 1) proceed = true;
              else proceed = false;

              if(proceed){
                  avail.innerHTML = "The game \"" + gameTitle + "\" is available";
                  titleContainer.style = 'border: 2px solid #9AFF9E;'
                  avail.setAttribute("class", "avail");
 
              }else{
                  avail.innerHTML = "The game \"" + gameTitle + "\" already exist";
                  titleContainer.style = 'border: 2px solid #F05B5C;'
                  avail.setAttribute("class", "notAvail");
              }
          }
       }
       http.open("GET", "titleAvail.php?q=" + gameTitle, true);
       http.send();
  }else{
      proceed=true;
      avail.innerHTML = "";
      titleContainer.style = 'border: 2px solid #FFFFFF;'
  }
}

function validate(){
  
  let posterElement = document.getElementById("image-prev");
  let gameTitleElement = document.getElementById("gameTitle");
  let consoleElement = document.getElementById("console");
  let genreElement = document.getElementById("genre");
  let directorElement = document.getElementById("director");
  let releaseYearElement = document.getElementById("releaseYear");

  // testCheck should equal to 6 if all input is valid
  let gameTitle = document.getElementById("gameTitle").value;
  gameTitle = gameTitle.trim();

  let console = document.getElementById("console").value;
  console = console.trim();

  let genre = document.getElementById("genre").value;
  genre = genre.trim();

  let director = document.getElementById("director").value;
  director = director.trim();
  
  let releaseYear = document.getElementById("releaseYear").value;
  releaseYear = releaseYear.trim();

  if(!isImageUploaded) {
    generateModal('Warning!', 'No Image for Game Poster is Uploaded.');
    modalTrigger.click();
    posterElement.style = 'border: 2px solid #F05B5C';
    return false;
  }

  if(gameTitle.length == 0) {
    generateModal('Warning!', 'Title is a Required Field.');
    gameTitleElement.parentNode.style = 'border: 2px solid #F05B5C';
    modalTrigger.click();
    return false;
  }

  if(gameTitle.length != 0 && !proceed){
    generateModal('Warning!', 'Game Already Exist.');
    gameTitleElement.parentNode.style = 'border: 2px solid #F05B5C';
    modalTrigger.click();
    return false;
  }

  if(gameTitle.length < 5){
    generateModal('Warning!', 'Minimum allowed character in title is 5.');
    gameTitleElement.parentNode.style = 'border: 2px solid #F05B5C';
    modalTrigger.click();
    return false;
  }

  if(gameTitle.length > 30){
    generateModal('Warning!', 'Maximum allowed character in title is 30.');
    gameTitleElement.parentNode.style = 'border: 2px solid #F05B5C';
    modalTrigger.click();
    return false;
  }

  if(console.length == 0) {
    generateModal('Warning!', 'Select a Console.');
    modalTrigger.click();
    consoleElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
    
  }

  if(genre.length == 0) {
    generateModal('Warning!', 'Select a Genre');
    modalTrigger.click();
    genreElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }
 
  if(director.length == 0) {
    generateModal('Warning!', 'Director is a Required Field.');
    modalTrigger.click();
    directorElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }

  if(!isOnlyChar(director)) {
    generateModal('Warning!', 'Director Cannot Contain a Number.');
    modalTrigger.click();
    directorElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }

  let dateobj = new Date();
  let maxYear = dateobj.getFullYear() + 2;

  if(releaseYear.length == 0) {
    generateModal('Warning!', 'Release Year is a Required Field.');
    modalTrigger.click();
    releaseYearElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }
  if(isNaN(releaseYear) || releaseYear.length > 4 || releaseYear.length < 4) {
    generateModal('Warning!', 'Release Year is Invalid');
    modalTrigger.click();
    releaseYearElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }
  if(releaseYear < 1975) {
    generateModal('Warning!', 'No Nintendo Game was Made Prior to the Year 1975.');
    modalTrigger.click();
    releaseYearElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }
  if(releaseYear > maxYear) {
    generateModal('Warning!', 'Only Nintendo games set to release within the next two years is allowed.');
    modalTrigger.click();
    releaseYearElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }
  if(isNaN(releaseYear)){
    generateModal('Warning!', 'Release Year is Invalid.');
    modalTrigger.click();
    releaseYearElement.parentNode.style = 'border: 2px solid #F05B5C';
    return false;
  }

  isValid = true;

}

function isOnlyChar(director) {
  for(i = 0; i < director.length; i++){

    if(director[i] == ' '){
      continue;
    }
    if(!isNaN(director[i])){
        return false
    }
  }
  return true;
}




function searchData(){
  let search = document.getElementById("search-box").value;

  if(search.length != 0 && search[0] != " "){

      drop.style = "display:flex;"

      http = new XMLHttpRequest();
      http.onreadystatechange = function(){
          if(http.readyState == 4 && http.status == 200){
              drop.innerHTML = "";
              drop.innerHTML = http.responseText;

              if(drop.innerHTML.length == 4){
                  drop.innerHTML = "&nbsp&nbsp&nbsp&nbspNo Results Found";
                  drop.style.color = 'black';
              }               
          }
      }
      http.open("GET", "pages/loadSearch.php?q=" + search, true);
      http.send();
      
  }else{
      drop.innerHTML = "";
      drop.style = "display:none;"
      loadData();
  }
}

function closeSearch(){
  drop.innerHTML = "";
  drop.style = "display:none;"
}


function clicked(e){
  let gameTitle = e;

    http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if(http.readyState == 4 && http.status == 200){
          generateModal('Result', http.responseText);
          modalTrigger.click();
        }
    }

    http.open("GET", "pages/getResult.php?q=" + gameTitle, true);
    http.send();

    drop.style = "display:none;";
}

function generateModal(title, content){
  let modalTitle = document.getElementById('modal-title');
  let modalContent = document.getElementById('modal-content');

  modalTitle.innerHTML = title;
  modalContent.innerHTML = content;
}


