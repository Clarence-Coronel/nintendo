// CREATE
$("#director").focus(function(){
    $(this).parent().css({
        backgroundColor: '#292727',
        border: '2px solid white'
    })   
});

$("#director").blur(function(){
    $(this).parent().css({
        backgroundColor: '#333131',
        border: 'none'
    })   
});

$("#releaseYear").focus(function(){
    $(this).parent().css({
        backgroundColor: '#292727',
        border: '2px solid white'
    })   
});

$("#releaseYear").blur(function(){
    $(this).parent().css({
        backgroundColor: '#333131',
        border: 'none'
    })   
});


// READ
$("#search-box").blur(function(){
    setTimeout(()=> {
        const dis = document.querySelector('.drop');
        dis.style.display = 'none';
    },100);
    //  $('.drop').hide(100);
});

$("#search-box").focus(function(){
    const search = document.querySelector('#search-box').value;
    if(search.length != 0){
        $('.drop').show();
    }
});


// UPDATE
$("#director").focus(function(){
    $(this).parent().css({
        backgroundColor: '#292727',
        border: '2px solid white'
    })   
});

$("#director").blur(function(){
    $(this).parent().css({
        backgroundColor: '#333131',
        border: 'none'
    })   
});

$("#releaseYear").focus(function(){
    $(this).parent().css({
        backgroundColor: '#292727',
        border: '2px solid white'
    })   
});

$("#releaseYear").blur(function(){
    $(this).parent().css({
        backgroundColor: '#333131',
        border: 'none'
    })   
});


// DELETE
function updateValues(){
  
    const gameTitleSelected = encodeURIComponent(document.getElementById('gameTitle-update').value);
    const start = document.querySelector('#start');
    
    http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if(http.readyState == 4 && http.status == 200){

            if(http.responseText){
                createSubmit.removeAttribute('disabled');
                createSubmit.style.backgroundColor = '#F05B5C';
                createSubmit.style.color = 'white';
                createSubmit.style.cursor = 'pointer';
            }
            
            // JQUERY
            $('#holder').html(http.responseText);
  
            poster_update.setAttribute('disabled', 'disabled');
            genre_update.setAttribute('disabled', 'disabled');
            releaseYear_update.setAttribute('disabled', 'disabled');
            console_update.setAttribute('disabled', 'disabled');
            director_update.setAttribute('disabled', 'disabled');
  
            poster_update.style.color = '#3b3d3b';
            
            genre_update.value = document.getElementById('genre-data').textContent;
            console_update.value = document.getElementById('console-data').textContent;
            releaseYear_update.value = document.getElementById('releaseYear-data').textContent;
            director_update.value = document.getElementById('director-data').textContent;
          
  
            imagePrev_update.style.backgroundImage = "url("+ document.getElementById('image-data').getAttribute('src') +")";
  
            updateSelectedImg = document.getElementById('image-data').getAttribute('src');
  
            start.style = 'display: none';
            const filter = document.getElementById('cover');
            filter.style = 'display:none';
            const cover = document.getElementById('cover');
            cover.style.display = 'flex';
  
  
            imagePrev_update.addEventListener('change',()=>{
  
                isImgChanged = true;
                const reader = new FileReader();
                reader.addEventListener('load', () =>{
                  image =  reader.result;
                  imagePrev_update.style.backgroundImage = `url(${image})`; 
                });
                reader.readAsDataURL(this.files[0]);
            })
        }
    }
    http.open("GET", "getResult2.php?q=" + gameTitleSelected, true);
    http.send();
  
  }