// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Paypal", "Stripe"],
    datasets: [{
      data: [0, 0],
      backgroundColor: ['#2cbaff', '#87ea49'],
      hoverBackgroundColor: ['#2cbaff', '#87ea49'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      mode: 'label',
      callbacks: {
        label: function (tooltipItem, data) {
          return data['labels'][tooltipItem['index']] + ' : ' + number_format(data['datasets'][tooltipItem['datasetIndex']]['data'][tooltipItem['index']], 2, ' ', ' ') + ' €';
        }
      }
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});