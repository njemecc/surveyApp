async function getCountryData() {
  const response = await fetch("http://localhost/api/getAges");

  const ages = await response.json();

  console.log(ages);

  const canvasElement = document.querySelector("#avgChart");

  const config = {
    type: "bar",
    data: {
      labels: [],
      datasets: [
        {
          label: "User Ages",
          data: [],
        },
      ],
    },
  };

  for (let i = 0; i < ages.length; i++) {
    config.data.labels.push(`$User${i}`);
  }

  for (let i = 0; i < ages.length; i++) {
    config.data.datasets[0].data.push(`${ages[i].age}`);
  }

  const avgChart = new Chart(canvasElement, config);

  return [];
}

getCountryData();
