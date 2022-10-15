function charts_two(array_careers, array_number_graduates, array_congruence, array_most_demanded_career) {

    var labels_careers = array_careers.map(a => a.career);
    var data_careers = array_careers.map(a => a.total);
    var colors_careers = randomColor({
        luminosity: 'light',
        count: data_careers.length
    });

    var labels_number_graduates = array_number_graduates.map(a => a.number_graduates);
    var data_number_graduates = array_number_graduates.map(a => a.total);
    var colors_number_graduates = randomColor({
        luminosity: 'light',
        count: data_number_graduates.length
    });

    var labels_congruence = array_congruence.map(a => a.congruence);
    var data_congruence = array_congruence.map(a => a.total);
    var colors_congruence = randomColor({
        luminosity: 'light',
        count: data_congruence.length
    });

    var labels_most_demanded_career = array_most_demanded_career.map(a => a.most_demanded_career);
    var data_most_demanded_career = array_most_demanded_career.map(a => a.total);
    var colors_most_demanded_career = randomColor({
        luminosity: 'light',
        count: data_most_demanded_career.length
    });


    //-------------
    //- PIE CHART -
    //-------------

    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
            datalabels: {
                formatter: (value, categories) => {
                    let sum = 0;
                    let dataArr = categories.chart.data.datasets[0].data;
                    dataArr.map(data => {
                        sum += data;
                    });
                    let percentage = (value * 100 / sum).toFixed(2) + "%";
                    return percentage;
                },
                color: '#fff',
                font: {
                    weight: 'bold',
                    size: 16,
                }
            },
        }
    };

    //Pie 1
    var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
    var pieData = {
        labels: labels_number_graduates,
        datasets: [{
            data: data_number_graduates,
            backgroundColor: colors_number_graduates,
        }]
    }

    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });


    //Pie 2
    var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d')
    var pieData2 = {
        labels: labels_congruence,
        datasets: [{
            data: data_congruence,
            backgroundColor: colors_congruence,
        }]
    }

    new Chart(pieChartCanvas2, {
        type: 'pie',
        data: pieData2,
        options: pieOptions
    });


    //Pie 3
    var pieChartCanvas3 = $('#pieChart3').get(0).getContext('2d')
    var pieData3 = {
        labels: labels_most_demanded_career,
        datasets: [{
            data: data_most_demanded_career,
            backgroundColor: colors_most_demanded_career,
        }]
    }

    new Chart(pieChartCanvas3, {
        type: 'pie',
        data: pieData3,
        options: pieOptions
    });

            var options = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                min: 0
              }    
            }]
          }
        };

        const data = {
            labels: labels_careers,
            datasets: [{
                label: 'Cuenta',
                data: data_careers,
                backgroundColor: colors_careers,
                borderWidth: 1,
            }]
        };

        var ctx = $('#bar').get(0).getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });

};

$("#print_button").click(function () {
    window.print();
});
