createSubmit.setAttribute('disabled', 'disabled');
createSubmit.style.backgroundColor = '#333131';
createSubmit.style.color = '#8A8A8A';
createSubmit.style.cursor = 'not-allowed';


let poster_update = document.getElementById('poster');
let imagePrev_update = document.getElementById('image-prev');
let genre_update = document.getElementById('genre');
let releaseYear_update = document.getElementById('releaseYear');
let console_update = document.getElementById('console');
let director_update = document.getElementById('director');
let downloadText = document.getElementById('download-text');

const titleTest = document.getElementById('gameTitle-update');

titleTest.addEventListener('change', () =>{

  updateValues();

})


poster_update.style.color = '#5d5e5d';
genre_update.style.color = '#5d5e5d';
releaseYear_update.style.color = '#5d5e5d';
console_update.style.color = '#5d5e5d';
director_update.style.color = '#5d5e5d';
downloadText.style.color = '#8B8B8B';



function generateModal2(title, content){
  let modalTitle = document.getElementById('modal-title');
  let modalContent = document.getElementById('modal-content');

  modalTitle.innerHTML = title;
  modalContent.innerHTML = content;
}


function deleteRecord(){
  const target = encodeURIComponent(document.getElementById('gameTitle-update').value);
  const modal = document.getElementById('deleteModal');
  http = new XMLHttpRequest();
  http.onreadystatechange = function(){
      if(http.readyState == 4 && http.status == 200){
      }
  }
  http.open("GET", "loadDelete.php?q=" + target, true);
  http.send();

  window.location.href = "loadDelete.php";
}


function confirmed(){
  generateModal2('Confirm', 'Are You Sure You Want to Delete this Record?');
  modalTrigger.click();
  return
}

function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}
  
  function read(val) {
    const reader = new FileReader();
  
    reader.onload = (event) => {
      document.getElementById("image-prev").backgroundImage = event.target.result;
    }
  
    reader.readAsDataURL(val.files[0]);
  }