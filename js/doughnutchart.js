const ctx2 = document.getElementById('doughnut').getContext('2d');
const chart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: [
                'Crispy Pata',
                'Fried Chicken',
                'Pork Barbeque',
                'Lumpiang Shanghai'
              ],

    datasets: [{
      label: 'My First Dataset',
        data: [103, 52, 32, 28],
        backgroundColor: [
              'rgb(232, 143, 43)',
              'rgb(190, 91, 10)',
              'rgb(129, 90, 51)',
              'rgb(197, 162, 120)'
          ],
      hoverOffset: 4
      }]
    },

    options: {
        responsive: true
    }
});
