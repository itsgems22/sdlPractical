// 1. Alert on page load
alert("Welcome! Let's explore some human life stats and time-based greetings.");

// 2. Calculate average number of weeks in a human lifetime
let averageAge = 72; // Avg human lifespan
let weeksInYear = 52;
let totalWeeks = averageAge * weeksInYear;

document.getElementById("lifetime").innerText =
  `Average human lifespan = ${totalWeeks} weeks.`;

// 3. Variable to store a string
let personName = "Shubham";
console.log("Name variable stored as: " + personName);

// 4. Time of the day program
let currentHour = new Date().getHours();
let message = "";

if (currentHour >= 5 && currentHour < 12) {
  message = "Good Morning!";
} else if (currentHour >= 12 && currentHour < 18) {
  message = "Good Afternoon!";
} else {
  message = "Good Evening!";
}

document.getElementById("greeting").innerText = message;
console.log("Greeting based on time: " + message);
