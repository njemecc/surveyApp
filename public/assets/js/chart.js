console.log("hello from chart");

async function getCountryData() {
  const response = await fetch("http://localhost/country.json");
  const avgCountries = await response.json();
  console.log(avgCountries);

  let avgSerbia = avgCountries[0]["serbia"] / avgCountries[10]["numberUsers"];
  let avgMalta = avgCountries[1]["malta"] / avgCountries[10]["numberUsers"];
  let avgKipar = avgCountries[2]["kipar"] / avgCountries[10]["numberUsers"];
  let avgItalia = avgCountries[3]["italia"] / avgCountries[10]["numberUsers"];
  let avgIsland = avgCountries[4]["island"] / avgCountries[10]["numberUsers"];
  let avgPortugal =
    avgCountries[5]["portugal"] / avgCountries[10]["numberUsers"];
  let avgAndora = avgCountries[6]["andora"] / avgCountries[10]["numberUsers"];
  let avgSpain = avgCountries[7]["spain"] / avgCountries[10]["numberUsers"];
  let avgFrance = avgCountries[8]["france"] / avgCountries[10]["numberUsers"];
  let avgGreece = avgCountries[9]["greece"] / avgCountries[10]["numberUsers"];

  const canvasElement = document.querySelector("#avgChart");

  const config = {
    type: "bar",
    data: {
      labels: [
        "Serbia",
        "Malta",
        "Kipar",
        "Italia",
        "Island",
        "Portugal",
        "Andora",
        "Spain",
        "France",
        "Greece",
      ],
      datasets: [
        {
          label: "Average per question",
          data: [
            avgSerbia,
            avgMalta,
            avgKipar,
            avgItalia,
            avgIsland,
            avgPortugal,
            avgAndora,
            avgSpain,
            avgFrance,
            avgGreece,
          ],
          backgroundColor: [
            "#FF5733",
            "#FAEE54",
            "#7EE956",
            "#4FD9E7",
            "#FC5E67",
            "#DC6FEE",
            "#747EE7",
            "#ECCE7A",
            "#B07DE3",
            "#B2E186",
          ],
        },
      ],
    },
  };

  const avgChart = new Chart(canvasElement, config);

  return [
    avgSerbia,
    avgMalta,
    avgKipar,
    avgItalia,
    avgIsland,
    avgPortugal,
    avgAndora,
    avgSpain,
    avgFrance,
    avgGreece,
  ];
}

getCountryData();
/*
setTimeout(makeChart(), 2000);


function makeChart() {
  const canvasElement = document.querySelector("#avgChart");

  const config = {
    type: "bar",
    data: {
      labels: [
        "Serbia",
        "Malta",
        "Kipar",
        "Italia",
        "Island",
        "Portugal",
        "Andora",
        "Spain",
        "France",
        "Greece",
      ],
      datasets: [
        {
          label: "Average per question",
          data: [
            avgSerbia,
            avgMalta,
            avgKipar,
            avgItalia,
            avgIsland,
            avgPortugal,
            avgAndora,
            avgSpain,
            avgFrance,
            avgGreece,
          ],
        },
      ],
    },
  };

  const avgChart = new Chart(canvasElement, config);
}
*/
