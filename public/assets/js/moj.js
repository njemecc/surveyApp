console.log("test");

const kontejner1 = document.querySelector(".kontejner1");
const kontejner2 = document.querySelector(".kontejner2");

const dugmad = document.querySelectorAll(".dugme");

const dugme1 = document.querySelector(".dugme1");
const dugme2 = document.querySelector(".dugme2");

/*
dugmad.forEach((d) =>
  d.addEventListener("click", function () {
    kontejner1.classList.toggle("nevidljiv");
    kontejner2.classList.toggle("nevidljiv");
  })
);


function addEvent(x) {
  x.addEventListener("click", function () {
    kontejner1.classList.toggle("nevidljiv");
    kontejner2.classList.toggle("nevidljiv");
  });
}

addEvent(dugme1);
addEvent(dugme2);
*/

dugme1.addEventListener("click", function () {
  kontejner1.classList.remove("nevidljiv");
  kontejner2.classList.add("nevidljiv");
});

dugme2.addEventListener("click", function () {
  kontejner2.classList.remove("nevidljiv");
  kontejner1.classList.add("nevidljiv");
});

/*
async function getCountryData() {
  const response = await fetch("http://localhost/country.json");
  const avgCountries = await response.json();
  console.log(avgCountries);

  const avgSerbia = avgCountries[0]["serbia"] / avgCountries[10]["numberUsers"];
  const avgMalta = avgCountries[1]["malta"] / avgCountries[10]["numberUsers"];
  const avgKipar = avgCountries[2]["kipar"] / avgCountries[10]["numberUsers"];
  const avgItalia = avgCountries[3]["italia"] / avgCountries[10]["numberUsers"];
  const avgIsland = avgCountries[4]["island"] / avgCountries[10]["numberUsers"];
  const avgPortugal =
    avgCountries[5]["portugal"] / avgCountries[10]["numberUsers"];
  const avgAndora = avgCountries[6]["andora"] / avgCountries[10]["numberUsers"];
  const avgSpain = avgCountries[7]["spain"] / avgCountries[10]["numberUsers"];
  const avgFrance = avgCountries[8]["france"] / avgCountries[10]["numberUsers"];
  const avgGreece = avgCountries[9]["greece"] / avgCountries[10]["numberUsers"];
}

getCountryData();
*/
