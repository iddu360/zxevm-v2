let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e) => {
    let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
    arrowParent.classList.toggle("showMenu");
  });
}
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});

function openTab(evt, tabName) {
  // Get all elements with class="tabcontent" and hide them
  var tabcontent = document.getElementsByClassName("tabcontent");
  for (var i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  var tablinks = document.getElementsByClassName("tablinks");
  for (var i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  // document.getElementById('tab1').style.display = "flex";
  // if (tabName=="tab1"){
    document.getElementById(tabName).style.display = "flex";
  // }else{
    // document.getElementById(tabName).style.display = "block";
  // }
  // document.getElementById(tabName).style.display = "flex";
  // document.getElementById(tabName).classList.add("active");
  evt.currentTarget.classList.add("active");
}

function openInfo(evt, tabName) {
  // Get all elements with class="wrapper-right-content" and hide them
  var wrapperRightContent = document.getElementsByClassName("wrapper-right-content");
  for (var i = 0; i < wrapperRightContent.length; i++) {
    wrapperRightContent[i].style.display = "none";
  }

  // Get all elements with class="headLink" and remove the class "active"
  var headLink = document.getElementsByClassName("headLink");
  for (var i = 0; i < headLink.length; i++) {
    headLink[i].classList.remove("active");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  // document.getElementById('tab1').style.display = "flex";
  // if (tabName=="tab1"){
    document.getElementById(tabName).style.display = "block";
  // }else{
    // document.getElementById(tabName).style.display = "block";
  // }
  // document.getElementById(tabName).style.display = "flex";
  // document.getElementById(tabName).classList.add("active");
  evt.currentTarget.classList.add("active");
}

let valueDisplays = document.querySelectorAll(".num");
let interval = 4000;

valueDisplays.forEach((valueDisplay) => {
  let startValue = 0;
  let endValue = parseInt(valueDisplay.getAttribute("data-val"));
  let duration = Math.floor(interval / endValue);
  let counter = setInterval(function () {
    startValue += 1;
    valueDisplay.textContent = startValue;
    if (startValue == endValue) {
      clearInterval(counter);
    }
  }, duration);
});

// document.addEventListener('DOMContentLoaded', function() {
//   let subMenu = document.getElementById('subMenu');

//   function toggleMenu() {
//     subMenu.classList.toggle("open-menu");
//   }
// });


let subMenu = document.getElementById("subMenu");
function toggleMenu() {
  subMenu.classList.toggle("open-menu");
}


const bartx = document.getElementById("myBarChart");

new Chart(bartx, {
  type: "bar",
  data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});

const pietx = document.getElementById("myPieChart");

new Chart(pietx, {
  type: "pie",
  data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});

