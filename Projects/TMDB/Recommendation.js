
const API_KEY = 'api_key=1cf50e6248dc270629e802686245c2c8';
const BASE_URL = 'https://api.themoviedb.org/3';
const API_URL = BASE_URL + '/discover/movie?sort_by=popularity.desc&'+API_KEY;
const IMG_URL = 'https://image.tmdb.org/t/p/w500';
const searchURL = BASE_URL + '/search/movie?'+API_KEY;


function onMyclick(){

    const  value = document.getElementById("search").value;
    if(value){
        getInfo(searchURL+'&query='+value)
    }

}



//Function to fetch the cast detail
function getInfo(url){
    fetch(url).then(res => res.json()).then(data => {
        console.log(data.results)
        
       const movieId =  data.results[0].id
       getMovieInfo(movieId)
        console.log(movieId)
    })
}

function getMovieInfo(id){
    fetch(BASE_URL +'/movie/'+id+'/recommendations?'+API_KEY+'&language=en-US&page=1').then(res => res.json()).then(d => {
        console.log(d.results);
       showRecMovies(d.results)
    })
}



function showRecMovies(data) {
    main.innerHTML = '';

    data.forEach(movie => {
        const {title, poster_path,release_date,vote_average, id,backdrop_path, overview} = movie;
        const movieEl = document.createElement('div');
        movieEl.classList.add('movie');
        movieEl.innerHTML = `
             <img src="${poster_path? IMG_URL+poster_path: "http://via.placeholder.com/1080x1580" }" alt="${title}" id = "${id}"   >
              <hr>
    
             <div class="movie-info" >
                <h4>${title}</h4>
               
                <span class="${getColor(vote_average)}">${vote_average}</span>
                </div> 
            
        
        `

        main.appendChild(movieEl);

        document.getElementById(id).addEventListener('click', () => {
          console.log(id)
          myOnClick()

          localStorage.setItem("background",movie.backdrop_path);
          localStorage.setItem("Title",movie.title);
          localStorage.setItem("Overview",movie.overview);
          localStorage.setItem("MovieId",movie.id);
          localStorage.setItem("Date",movie.release_date);
        
         
        })
       
 
    })
}

function myOnClick(){
  document.location.href="review.html";
}


function getColor(vote) {
    if(vote>= 8){
        return 'green'
    }else if(vote >= 5){
        return "orange"
    }else{
        return 'red'
    }
}
