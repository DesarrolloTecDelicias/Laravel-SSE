function charts_five(array_courses_yes_no, array_master_yes_no) {
    var labels_courses_yes_no = array_courses_yes_no.map(
        (a) => a.courses_yes_no
    );
    var data_courses_yes_no = array_courses_yes_no.map((a) => a.total);
    var colors_courses_yes_no = randomColor({
        luminosity: "light",
        count: data_courses_yes_no.length,
    });

    var labels_master_yes_no = array_master_yes_no.map((a) => a.master_yes_no);
    var data_master_yes_no = array_master_yes_no.map((a) => a.total);
    var colors_master_yes_no = randomColor({
        luminosity: "light",
        count: data_master_yes_no.length,
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
                    dataArr.map((data) => {
                        sum += data;
                    });
                    let percentage = ((value * 100) / sum).toFixed(2) + "%";
                    return percentage;
                },
                color: "#fff",
                font: {
                    weight: "bold",
                    size: 16,
                },
            },
        },
    };

    //Pie 1
    var pieChartCanvas1 = $("#pieChart1").get(0).getContext("2d");
    var pieData1 = {
        labels: labels_courses_yes_no,
        datasets: [
            {
                data: data_courses_yes_no,
                backgroundColor: colors_courses_yes_no,
            },
        ],
    };

    new Chart(pieChartCanvas1, {
        type: "pie",
        data: pieData1,
        options: pieOptions,
    });

    //Pie 2
    var pieChartCanvas2 = $("#pieChart2").get(0).getContext("2d");
    var pieData2 = {
        labels: labels_master_yes_no,
        datasets: [
            {
                data: data_master_yes_no,
                backgroundColor: colors_master_yes_no,
            },
        ],
    };

    new Chart(pieChartCanvas2, {
        type: "pie",
        data: pieData2,
        options: pieOptions,
    });
}

$("#print_button").click(function () {
    window.print();
});
