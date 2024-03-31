// const container = document.querySelector('.container');
// const seats = document.querySelectorAll('.row .seat:not(.occupied');
// const count = document.getElementById('count');
// let total = document.getElementById('total');
// const movieSelect = document.getElementById('movie');
// const button = document.querySelector(".button");

// populateUI();
// let ticketPrice = +movieSelect.value;

// var person_AMT = localStorage.getItem("textvalue");
// Number(person_AMT);


// //save selected movie index and price
// function setMovieData(movieIndex,moviePrice){
//     localStorage.setItem('selectedMovieIndex',movieIndex);
//     localStorage.setItem('selectedMovieIndex',moviePrice);
// }

// //update total and count
// function updateSelectedCount(){
//     const selectedSeats = document.querySelectorAll('.row .seat.selected');
    
//     const seatsIndex = [...selectedSeats].map(function(seat){
//         return [...seats].indexOf(seat);
//     });

//     localStorage.setItem('selectedSeats',JSON.stringify(seatsIndex));
//     let selectedSeatsCount = selectedSeats.length;
//     count.innerText = selectedSeatsCount;
//     total.innerText = person_AMT - selectedSeatsCount;
// }

// //get data from localstorage and populate ui (convert data to array)
// function populateUI(){
//     const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

//     if(selectedSeats !== null && selectedSeats.length>0){
//         seats.forEach((seat,index)=>{
//             if(selectedSeats.indexOf(index) > -1){
//                 seat.classList.add('selected');
//             }
//         });
//     }
 
//     const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');
//     if(selectedMovieIndex != null){
//         movieSelect.selectedIndex = selectedMovieIndex;
//     }

// }

// //turn occupied
// let seatsNotSelected = document.querySelectorAll(".seat:not(.selected)");
// let occupate = JSON.parse(localStorage.getItem("occupate"));
// if (occupate !== null && occupate.length > 0) {
//     sedieNotSelected.forEach((poltrona, index) => {
//       if (occupate.indexOf(index) > -1) {
//         poltrona.classList.add("occupata");
//       }
//     });}

// function tornOccupied(){
//     button.addEventListener("click",() =>{
//         let selectedSeats = document.querySelectorAll('.row .seat.selected');
//         seats.forEach(element =>{
//             element.classList.remove("selected");
//             //clear field
//             total.innerHTML="";
//             count.innerHTML="";
//             // Clear localStorage
//             localStorage.clear();
//             //save inside local storage
//             let seatoccupied = document.querySelectorAll('row .seat.occupied');

//             const seatsIndex = [...seatoccupied].map(seat=>{
//                 return [...seatsNotSelected].indexOf(seat);
//             });

//             //save
//             localStorage.setItem("occupate", JASON.stringify(seatsIndex));
//             });
//         });
//     }


// //movie select event
// movieSelect.addEventListener('change',(e) =>{
//     ticketPrice = +e.target.value;
//     setMovieData(e.target.selectedIndex, e.target.value);
//     updateSelectedCount();
// })
// // Seat click event
// container.addEventListener('click', (e) => {
//     if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
//         e.target.classList.toggle('selected');  
//         updateSelectedCount();
//         if(person_AMT == count.innerText){
//             var button = document.querySelector(".button");
//             button.addEventListener("click",function () {
//             alert("HELLO WORLD!");
//             },false);
//             turnOccupied();
//         }
//         else{
//             updateSelectedCount();
//         }
//     }

//   });

//   updateSelectedCount();









const container = document.querySelectorAll(".container");
let total = document.getElementById('total');
// Select seats total
let count = document.getElementById('count');
let postoS = document.querySelector(".postoS");
// Select button
const button = document.querySelector(".button");
//select back home button
const back = document.querySelector(".back");
// Select film selector
let movie = document.getElementById("movie");
// Select sedie
const seats = document.querySelectorAll(".seat:not(.occupied)");
// Global Variables
let removeSeat = false;
let seatRow = 0;
let seatNumber = 0;

var person_AMT = localStorage.getItem("textvalue");
Number(person_AMT);

let rowNumb = document.querySelectorAll(".rowNumb");
rowNumb.forEach(element => {
  element.innerHTML = `Fila ${element.id}`;
});
//******************* UPDATE VALUES FUNCTION */
const updateValues = (seatNumber, seatRow, removeSeat) => {
  // Select seats with class 'selected'
  let seatSelected = document.querySelectorAll(".row .seat.selected");

  // Create array for localstorage
  let localStorageSeats = [...seatSelected].map(seat => {
    return [...seats].indexOf(seat);
  });
  // Save seats selected inside browser localstorage
  localStorage.setItem("poltrone", JSON.stringify(localStorageSeats));
  // Set ticket price
  let ticket = movie.value;
  // Seats total number
  if(count.innerHTML <= person_AMT){
    count.innerHTML = seatSelected.length;
    // remaining seats
    total.innerHTML = person_AMT-seatSelected.length ;
  }else{
    alert("Seats have been selected");
  }

};


//************ Load data from browser local storage */
let seatNotSelected = document.querySelectorAll(".seat:not(.selelected)");
const loadData = () => {
  // Load data from the browser
  let poltrone = JSON.parse(localStorage.getItem("poltrone"));
  let film = localStorage.getItem("film");
  let price = localStorage.getItem("price");
  let occupied = JSON.parse(localStorage.getItem("occupied"));
  // Set selected seats
  if (poltrone !== null && poltrone.length > 0) {
    seats.forEach((poltrona, index) => {
      if (poltrone.indexOf(index) > -1) {
        poltrona.classList.add("selected");
      }
    });
  }

  // Set seats occupied
  if (occupied !== null && occupied.length > 0) {
    seatNotSelected.forEach((poltrona, index) => {
      if (occupied.indexOf(index) > -1) {
        poltrona.classList.add("occupied");
      }
    });
  }


  // Set movie title
  let movieSavedIdx = localStorage.getItem("film");
  if (movieSavedIdx !== null) {
    movie.selectedIndex = movieSavedIdx;
  }

  // Update values
  updateValues();

  // Populate area info
  let seatsInfo = localStorage.getItem("S&&F");
  postoS.innerHTML = seatsInfo;
};
// Run load data
loadData();

//*************** Select seat and add event listener */
const seatReload = document.querySelectorAll(".seat:not(.occupied");
seatReload.forEach(element => {
  // Set seat number
  element.innerHTML = element.id;
  // Add event listener
  element.addEventListener("click", () => {
    seatRow = element.parentElement.id;
    seatNumber = element.id;


    // Add and remove color class
    if (element.classList.value == "seat" && count.innerHTML < person_AMT) {
      element.classList.add("selected");
      // Set false remove variable
      removeSeat = false;
      // Update values
      updateValues(seatNumber, seatRow, removeSeat);
    } else {
      element.classList.remove("selected");
      // Set true remove variable
      removeSeat = true;  
      updateValues(seatNumber, seatRow, removeSeat);
    }
  });
});
 
// var  pt = localStorage.getItem("textvalue");
document.getElementById("person_tol").innerHTML = localStorage.getItem("textvalue");

//********************* Movie title event listener */
// button.addEventListener("click", () => {
//   let seat = document.querySelectorAll(".seat.selected");
//   seat.forEach(element => {
//     element.classList.remove("selected");
//     element.classList.add("occupied");
//     // Clear all fields
//     element.innerHTML = "";
//     count.innerHTML = "";
//     total.innerHTML = "";

//     // Populate info area
//     if (seatNumber && seatRow !== undefined) {
//       if (!removeSeat) {
//         postoS.innerHTML += ` ${seatNumber}/${seatRow} -`;
//         // Save value inside browser local storage
//         localStorage.setItem("S&&F", postoS.innerHTML);
//       } else {
//         postoS.innerHTML = postoS.innerHTML.replace(
//           ` ${seatNumber}/${seatRow} -`,
//           ""
//         );
//       // Save value inside browser local storage
//       localStorage.setItem("S&&F", postoS.innerHTML);
//       }
//     }
//     // Clear localStorage
//     localStorage.clear();
//     // Save inside local Storage
//     let seatBusySelec = document.querySelectorAll(".row .seat.occupied");

//     const localStorageSeatsOccupied = [...seatBusySelec].map(seat => {
//       return [...seatNotSelected].indexOf(seat);
//     });
//     // Save
//     localStorage.setItem("occupied", JSON.stringify(localStorageSeatsOccupied));
//     // localStorage.clear();
    
//   }); 
 
// })

//***********************back page button*/
back.onclick = function(){
  let seat2 = document.querySelectorAll(".selected");
  seat2.forEach(element =>{
    element.classList.remove("selected");
    element.classList.add("seat");
    //Clear all fields
    element.innerHTML = "";
    count.innerHTML = "";
    total.innerHTML = "";
    postoS.innerHTML = "";
    //Save inside local Storage
    let seatSelec = document.querySelectorAll(".row .seat");

    const localStorageSeatselected = [...seatSelec].map(seat => {
      return [...seatNotSelected].indexOf(seat);
    });
    // Save
    localStorage.getItem("poltrone", JSON.stringify(localStorageSeatselected));

    var seatNum = JSON.parse(localStorage.getItem("poltrone"));
    localStorage.setItem("textvalue3",seatNum);  
    var period = document.getElementById("movie").value; 
    localStorage.setItem("textvalue2",period);   
    return false;
  });
  history.back(-1);  //返回無法更新
}