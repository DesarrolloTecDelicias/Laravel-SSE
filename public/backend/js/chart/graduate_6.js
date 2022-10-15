function charts_six(
    array_organization_yes_no,
    array_agency_yes_no,
    array_association_yes_no
) {
    var labels_organization_yes_no = array_organization_yes_no.map(
        (a) => a.organization_yes_no
    );
    var data_organization_yes_no = array_organization_yes_no.map(
        (a) => a.total
    );
    var colors_organization_yes_no = randomColor({
        luminosity: "light",
        count: data_organization_yes_no.length,
    });

    var labels_agency_yes_no = array_agency_yes_no.map((a) => a.agency_yes_no);
    var data_agency_yes_no = array_agency_yes_no.map((a) => a.total);
    var colors_agency_yes_no = randomColor({
        luminosity: "light",
        count: data_agency_yes_no.length,
    });

    var labels_association_yes_no = array_association_yes_no.map(
        (a) => a.association_yes_no
    );
    var data_association_yes_no = array_association_yes_no.map((a) => a.total);
    var colors_association_yes_no = randomColor({
        luminosity: "light",
        count: data_association_yes_no.length,
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
        labels: labels_organization_yes_no,
        datasets: [
            {
                data: data_organization_yes_no,
                backgroundColor: colors_organization_yes_no,
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
        labels: labels_agency_yes_no,
        datasets: [
            {
                data: data_agency_yes_no,
                backgroundColor: colors_agency_yes_no,
            },
        ],
    };

    new Chart(pieChartCanvas2, {
        type: "pie",
        data: pieData2,
        options: pieOptions,
    });

    //Pie 3
    var pieChartCanvas3 = $("#pieChart3").get(0).getContext("2d");
    var pieData3 = {
        labels: labels_association_yes_no,
        datasets: [
            {
                data: data_association_yes_no,
                backgroundColor: colors_association_yes_no,
            },
        ],
    };

    new Chart(pieChartCanvas3, {
        type: "pie",
        data: pieData3,
        options: pieOptions,
    });
}

$("#print_button").click(function () {
    window.print();
});
