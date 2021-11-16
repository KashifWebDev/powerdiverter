// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("dashboardPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Western Australia", "Northern Territory", "South Australia", "Queensland",  "New South Wales", "Victoria", "Tasmania"],
    datasets: [{
      data: [55, 30, 15, 24, 33, 84, 11],
      backgroundColor: ['#4e73df', '#1cc88a', '#1cc88a', '#f6c23e', '#36b9cc', '#5a5c69', '#858796'],
      // hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBackgroundColor: ['#4e73df', '#1cc88a', '#1cc88a', '#f6c23e', '#36b9cc', '#5a5c69', '#858796'],
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
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
