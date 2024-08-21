let hamburger = document.querySelector(".hamburger");
let nav_list = document.querySelector(".nav-list");
let line1 = document.querySelector(".line1");
let line2 = document.querySelector(".line2");
let line3 = document.querySelector(".line3");
let line = document.querySelector(".line");
hamburger.addEventListener("click", () => {
  nav_list.classList.toggle("nav-list-onclick");
  line1.classList.toggle("line1-onclick");
  line2.classList.toggle("line2-onclick");
  line3.classList.toggle("line3-onclick");
  hamburger.classList.toggle("hamburger-onclick");
  document.childNodes[1].classList.toggle("body-onclick");
});

// /////////////////////////////////////////

//form validation

let fname = document.querySelector("#first-name");
let full_name = document.querySelector("#full-name");
let email = document.querySelector("#email");
let textarea = document.querySelector("#textarea");

let fname_div = document.querySelector(".first-name");
let full_name_div = document.querySelector(".full-name");
let email_div = document.querySelector(".email");
let textarea_div = document.querySelector(".textarea");
let form = document.querySelector("form");
let button = document.querySelector("#button");
form.addEventListener("submit", (e) => {
  let regx_name = /^[a-zA-Z]{2,20}$/;
  let regx_full_name = /^[a-zA-Z]{4,40}$/;
  let regx_email = /^[a-zA-Z0-9.]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  span_content_name = "min-2 max-20 charachters with A-Z";
  span_content_full_name = "min-4 max-40 charachters with A-Z";
  span_content_email = "please enter valid email";

  //For first name
  if (fname_div.children.length == 1) {
    let span_fname = document.createElement("span");
    span_fname.classList.toggle("div-span");
    fname_div.appendChild(span_fname);
    addSpan(span_fname, fname, e, regx_name, span_content_name);
  } else {
    let span_fname = fname_div.children[1];
    addSpan(span_fname, fname, e, regx_name, span_content_name);
  }

  //   For full name
  if (full_name_div.children.length == 1) {
    let span_full_name = document.createElement("span");
    span_full_name.classList.toggle("div-span");
    full_name_div.appendChild(span_full_name);
    addSpan(span_full_name, full_name, e, regx_full_name, span_content_name);
  } else {
    let span_full_name = full_name_div.children[1];
    addSpan(span_full_name, full_name, e, regx_full_name, span_content_name);
  }

  // For email
  if (email_div.children.length == 1) {
    let span_email = document.createElement("span");
    span_email.classList.toggle("div-span");
    email_div.appendChild(span_email);
    addSpan(span_email, email, e, regx_email, span_content_email);
  } else {
    let span_email = email_div.children[1];
    addSpan(span_email, email, e, regx_email, span_content_email);
  }

  //For textarea
  if (textarea_div.children.length == 1) {
    let span_textarea = document.createElement("span");
    span_textarea.classList.toggle("div-span");
    textarea_div.appendChild(span_textarea);
    addSpanForTextarea(span_textarea, textarea, e);
  } else {
    let span_textarea = textarea_div.children[1];
    addSpanForTextarea(span_textarea, textarea, e);
  }

  // For validation
  function addSpan(span, input, e, regx, spanContent) {
    if (input.value === "") {
      span.innerHTML = "*This field is required";
      input.classList.add("input-border");
      e.preventDefault();
    } else if (regx.test(input.value)) {
      span.innerHTML = "";
      input.classList.remove("input-border");
    } else {
      span.innerHTML = spanContent;
      input.classList.add("input-border");
      e.preventDefault();
    }
  }
});
function addSpanForTextarea(span, input, e) {
  if (input.value == "") {
    span.innerHTML = "This field is required";
    input.classList.add("input-border");
    e.preventDefault();
  } else {
    span.innerHTML = "";
    input.classList.remove("input-border");
  }
}

//Tabs
let tabs = document.querySelectorAll(".click-tab");
let data = document.querySelector(".data");

tabs.forEach((tab, index) => {
  tab.addEventListener("click", (e) => {
    // Get the class name of the clicked tab
    let className = tab.children[0].className;
    Array.from(data.children).forEach((ele)=>{
       if((className.split(" ")[1]+"-content")!==ele.className.split(" ")[1])
       {
         ele.classList.add("no-display")
       }
       else{
        ele.classList.remove("no-display")
       }
    })

    let tabClass = className.split(" ")[1];
    tab.children[0].classList.add("tab-onclick");

    tabs.forEach((otherTab, idx) => {
      if (idx !== index) {
        otherTab.children[0].classList.remove("tab-onclick");
      }
    });
  });
});


//filter range
document.addEventListener('DOMContentLoaded', function () {
  let inputMin = document.querySelector(".min");
  let inputMax = document.querySelector(".max");
  let Filter_main = document.querySelector(".filter-range-left");
  let items = document.querySelectorAll(".items");
  let item_list = document.querySelectorAll(".item-list");
  document.querySelectorAll('input').forEach(function (input) {
      input.addEventListener('mousemove', function () {
          document.querySelector(".low").textContent = inputMin.value;
          document.querySelector(".high").textContent = inputMax.value;
          if (parseInt(inputMin.value) + 7> parseInt(inputMax.value)) {
              input.disabled = true;
          } else {
              input.disabled = false;
          }
      });
  });

  document.querySelector('.click-filter').addEventListener('click', function () {
      if(Filter_main.children.length===2){
        Filter_main.removeChild(Filter_main.lastChild) 
      }
      let minVal = parseInt(inputMin.value);
      let maxVal = parseInt(inputMax.value);
      let foundResult = false;
  
      items.forEach(function(element) {
          element.style.display = 'none'; // Hide all shoes initially
          let price_string = element.children[2].innerHTML;
          let price = parseInt(price_string.slice(1));
          if (price >= minVal && price <= maxVal) {
              element.style.display = 'flex'; // Show matching shoes
              foundResult = true;
          }
      });
   
      if (!foundResult) {
          let Div = document.createElement("div");
          Div.classList.add("no-result");
          Div.textContent = "No Result Found";
          Filter_main.appendChild(Div);
      }

  });

  //show all
  document.querySelector('.show-all').addEventListener('click', function () {
    items.forEach(function(element) {
          element.style.display = 'flex'; 
  });

  })

  //sorting buttons
  document.querySelectorAll('.sort-button').forEach((element)=>{
  element.addEventListener('click', function () {

let itemList = document.querySelector('.item-list');
let items1 = Array.from(items);

// Function to sort item by price low to high
function sortByPriceLowToHigh() {
  items1.sort((a, b) => {
        let priceA = parseInt(a.children[2].innerHTML.slice(1));
        let priceB = parseInt(b.children[2].innerHTML.slice(1));
        return priceA - priceB;
    });

    itemList.innerHTML = '';
    items1.forEach(item => {
      itemList.appendChild(item);
    });
}

// Function to sort item by price high to low
function sortByPriceHighToLow() {
  items1.sort((a, b) => {
        let priceA = parseInt(a.children[2].innerHTML.slice(1));
        let priceB = parseInt(b.children[2].innerHTML.slice(1));
        return priceB - priceA;
    });

    itemList.innerHTML = '';
    items1.forEach(item => {
      itemList.appendChild(item);
    });
}

  // Function to revert to default order
  function revertToDefaultOrder() {
    itemList.innerHTML = '';
    items1.forEach(shoe => {
        itemList.appendChild(shoe);
    });
    // Reset shoes array to default order
    items1 = Array.from(items1);
}

if(element.classList.contains("default-sort"))
  {
    revertToDefaultOrder(); 
  }
 if(element.classList.contains("sort-low-high"))
  {
      sortByPriceLowToHigh();
  }
  if(element.classList.contains("sort-high-low"))
    {
        sortByPriceHighToLow();
    }

  })
  })


//couter function

function startCountdown() {
  let endTime = new Date(); // Get current time
  endTime.setDate(endTime.getDate() + 4); // Set end time 4 days from now
  
  let count_list=document.querySelector(".count-list");
  Array.from(count_list.children).forEach((element)=>{

  // Update the timer every second
  let timerInterval = setInterval(function() {
      let currentTime = new Date(); // Get current time
      let timeDifference = endTime - currentTime; // Calculate time difference in milliseconds

      if (timeDifference <= 0) {
          clearInterval(timerInterval);
          document.getElementById('timer').textContent = 'Countdown Complete!';
          return;
      }

      // Calculate remaining time in days, hours, minutes, and seconds
      let days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
      let hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

  
      if(element.classList.contains("days")){
      element.children[0].innerHTML = days;
      }
      if(element.classList.contains("hours")){
        element.children[0].innerHTML = hours;
        }
        if(element.classList.contains("minutes")){
          element.children[0].innerHTML = minutes;
          }
          if(element.classList.contains("seconds")){
            element.children[0].innerHTML = seconds;
            }
  }, 1000); 

  })
}
startCountdown();

//Accordian
const accordionBtns = document.querySelectorAll(".arrow-down");

accordionBtns.forEach((accordion) => {

  accordion.onclick = function () {

    let content = this.parentNode.nextElementSibling;
if (accordion !== this) {
    accordion.classList.remove("arrow-down-onclick");
    accordion.nextElementSibling.style.maxHeight = null;
  }
  this.classList.toggle("arrow-down-onclick");

    // accordion.classList.toggle("arrow-down-onclick");
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  };
  
});

});

