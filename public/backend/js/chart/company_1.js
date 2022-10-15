function charts_one(array_state, array_company_size, array_business_structure,
    array_business_activity_selector) {

    var labels_state = array_state.map(a => a.state);
    var data_state = array_state.map(a => a.total);
    var colors_state = randomColor({
        luminosity: 'light',
        count: data_state.length
    });

    var labels_company_size = array_company_size.map(a => a.company_size);
    var data_company_size = array_company_size.map(a => a.total);
    var colors_company_size = randomColor({
        luminosity: 'light',
        count: data_company_size.length
    });

    var labels_business_structure = array_business_structure.map(a => a.business_structure);
    var data_business_structure = array_business_structure.map(a => a.total);
    var colors_business_structure = randomColor({
        luminosity: 'light',
        count: data_business_structure.length
    });

    var labels_business_activity_selector = array_business_activity_selector.map(a => a.business_activity_selector);
    var data_business_activity_selector = array_business_activity_selector.map(a => a.total);
    var colors_business_activity_selector = randomColor({
        luminosity: 'light',
        count: data_business_activity_selector.length
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
        labels: labels_state,
        datasets: [{
            data: data_state,
            backgroundColor: colors_state,
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
        labels: labels_company_size,
        datasets: [{
            data: data_company_size,
            backgroundColor: colors_company_size,
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
        labels: labels_business_structure,
        datasets: [{
            data: data_business_structure,
            backgroundColor: colors_business_structure,
        }]
    }

    new Chart(pieChartCanvas3, {
        type: 'pie',
        data: pieData3,
        options: pieOptions
    });


    //Pie 4
    var pieChartCanvas4 = $('#pieChart4').get(0).getContext('2d')
    var pieData4 = {
        labels: labels_business_activity_selector,
        datasets: [{
            data: data_business_activity_selector,
            backgroundColor: colors_business_activity_selector,
        }]
    }

    new Chart(pieChartCanvas4, {
        type: 'pie',
        data: pieData4,
        options: pieOptions
    });

};

$("#print_button").click(function () {
    window.print();
});
