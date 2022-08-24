const API_KEY = 'api_key=1cf50e6248dc270629e802686245c2c8';
const BASE_URL = 'https://api.themoviedb.org/3';
const API_URL = BASE_URL + '/discover/movie?sort_by=popularity.desc&'+API_KEY;
const IMG_URL = 'https://image.tmdb.org/t/p/w500';
const searchURL = BASE_URL + '/search/movie?'+API_KEY;



// Movie_Data_From_Script.js 
let id = localStorage.getItem("MovieId");
const back = localStorage.getItem("background");
console.log(back);
const over = localStorage.getItem("Overview");
console.log(over);
const title = localStorage.getItem("Title");
console.log(title);
const date = localStorage.getItem("Date");
console.log(date);



//Div
const movieDet = document.getElementById('movieDetails');
const minfo = document.getElementById('Info');
const main = document.getElementById('main');

//For set the image of movie
var image = document.createElement('div');
image.classList.add('movieDetails');
image.innerHTML =`
<img src =${IMG_URL+back}>
`
movieDet.appendChild(image);

//for put set the TITLE and Overview Of Movie
var info = document.createElement('div');
info.classList.add('Info');
info.innerHTML =`

<h2>  ${title } (${date}) </h2>
<h5><u>Overview</u>:</h5>
<h4>${over}</h4>
<h6><u> Cast</u> :</h6>
`
minfo.appendChild(info);


//calling fuction
getInfo(id)

//Function to fetch the cast detail
function getInfo(id){
    fetch(BASE_URL +'/movie/'+id+'/credits?'+API_KEY).then(res => res.json()).then(d => {
        console.log(d.cast);
        showMoviesData(d.cast)
    })
}
// function to show the images and name of cast/
function showMoviesData(data){     
data.forEach(detail => {
    const{name,profile_path} =detail;
    const det = document.createElement('div');
    det.classList.add('ActorImages');
    if(profile_path){
    det.innerHTML =`
     <img src="${IMG_URL+profile_path}" alt= ${name}>
     <div class="ActorName" >
      <h2>${name}</h2>  
      </div>
     `
     main.appendChild(det);
    }
});
    
}

document.getElementById("Back").addEventListener('click',()=>{
    onclick()
})
  function onclick(){
      document.location.href="index.html";
  }
