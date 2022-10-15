function charts_three(
    array_do_for_living,
    array_speciality,
    array_long_take_job,
    array_language_most_spoken,
    array_seniority,
    array_year,
    array_salary,
    array_management_level,
    array_job_condition,
    array_job_relationship,
    array_business_structure,
    array_company_size,
    array_business_activity_selector
) {
    var labels_do_for_living = array_do_for_living.map((a) => a.do_for_living);
    var data_do_for_living = array_do_for_living.map((a) => a.total);
    var colors_do_for_living = randomColor({
        luminosity: "light",
        count: data_do_for_living.length,
    });

    var labels_speciality = array_speciality.map((a) => a.speciality);
    var data_speciality = array_speciality.map((a) => a.total);
    var colors_speciality = randomColor({
        luminosity: "light",
        count: data_speciality.length,
    });

    var labels_long_take_job = array_long_take_job.map((a) => a.long_take_job);
    var data_long_take_job = array_long_take_job.map((a) => a.total);
    var colors_long_take_job = randomColor({
        luminosity: "light",
        count: data_long_take_job.length,
    });

    var labels_language_most_spoken = array_language_most_spoken.map(
        (a) => a.language_most_spoken
    );
    var data_language_most_spoken = array_language_most_spoken.map(
        (a) => a.total
    );
    var colors_language_most_spoken = randomColor({
        luminosity: "light",
        count: data_language_most_spoken.length,
    });

    var labels_seniority = array_seniority.map((a) => a.seniority);
    var data_seniority = array_seniority.map((a) => a.total);
    var colors_seniority = randomColor({
        luminosity: "light",
        count: data_seniority.length,
    });

    var labels_year = array_year.map((a) => a.year);
    var data_year = array_year.map((a) => a.total);
    var colors_year = randomColor({
        luminosity: "light",
        count: data_year.length,
    });

    var labels_salary = array_salary.map((a) => a.salary);
    var data_salary = array_salary.map((a) => a.total);
    var colors_salary = randomColor({
        luminosity: "light",
        count: data_salary.length,
    });

    var labels_management_level = array_management_level.map(
        (a) => a.management_level
    );
    var data_management_level = array_management_level.map((a) => a.total);
    var colors_management_level = randomColor({
        luminosity: "light",
        count: data_management_level.length,
    });

    var labels_job_condition = array_job_condition.map((a) => a.job_condition);
    var data_job_condition = array_job_condition.map((a) => a.total);
    var colors_job_condition = randomColor({
        luminosity: "light",
        count: data_job_condition.length,
    });

    var labels_job_relationship = array_job_relationship.map(
        (a) => a.job_relationship
    );
    var data_job_relationship = array_job_relationship.map((a) => a.total);
    var colors_job_relationship = randomColor({
        luminosity: "light",
        count: data_job_relationship.length,
    });

    var labels_business_structure = array_business_structure.map(
        (a) => a.business_structure
    );
    var data_business_structure = array_business_structure.map((a) => a.total);
    var colors_business_structure = randomColor({
        luminosity: "light",
        count: data_business_structure.length,
    });

    var labels_company_size = array_company_size.map((a) => a.company_size);
    var data_company_size = array_company_size.map((a) => a.total);
    var colors_company_size = randomColor({
        luminosity: "light",
        count: data_company_size.length,
    });

    var labels_business_activity_selector =
        array_business_activity_selector.map(
            (a) => a.business_activity_selector
        );
    var data_business_activity_selector = array_business_activity_selector.map(
        (a) => a.total
    );
    var colors_business_activity_selector = randomColor({
        luminosity: "light",
        count: data_business_activity_selector.length,
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
    var pieChartCanvas = $("#pieChart1").get(0).getContext("2d");
    var pieData = {
        labels: labels_do_for_living,
        datasets: [
            {
                data: data_do_for_living,
                backgroundColor: colors_do_for_living,
            },
        ],
    };

    new Chart(pieChartCanvas, {
        type: "pie",
        data: pieData,
        options: pieOptions,
    });

    //Pie 2
    var pieChartCanvas2 = $("#pieChart2").get(0).getContext("2d");
    var pieData2 = {
        labels: labels_speciality,
        datasets: [
            {
                data: data_speciality,
                backgroundColor: colors_speciality,
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
        labels: labels_long_take_job,
        datasets: [
            {
                data: data_long_take_job,
                backgroundColor: colors_long_take_job,
            },
        ],
    };

    new Chart(pieChartCanvas3, {
        type: "pie",
        data: pieData3,
        options: pieOptions,
    });

    //Pie 4 -- 1
    var pieChartCanvas4 = $("#pieChart4").get(0).getContext("2d");
    var pieData4 = {
        labels: labels_language_most_spoken,
        datasets: [
            {
                data: data_language_most_spoken,
                backgroundColor: colors_language_most_spoken,
            },
        ],
    };

    new Chart(pieChartCanvas4, {
        type: "pie",
        data: pieData4,
        options: pieOptions,
    });

    //Pie 5 -- 2
    var pieChartCanvas5 = $("#pieChart5").get(0).getContext("2d");
    var pieData5 = {
        labels: labels_seniority,
        datasets: [
            {
                data: data_seniority,
                backgroundColor: colors_seniority,
            },
        ],
    };

    new Chart(pieChartCanvas5, {
        type: "pie",
        data: pieData5,
        options: pieOptions,
    });

    //Pie 7 -- 4
    var pieChartCanvas7 = $("#pieChart7").get(0).getContext("2d");
    var pieData7 = {
        labels: labels_salary,
        datasets: [
            {
                data: data_salary,
                backgroundColor: colors_salary,
            },
        ],
    };

    new Chart(pieChartCanvas7, {
        type: "pie",
        data: pieData7,
        options: pieOptions,
    });

    //Pie 8 -- 5
    var pieChartCanvas8 = $("#pieChart8").get(0).getContext("2d");
    var pieData8 = {
        labels: labels_management_level,
        datasets: [
            {
                data: data_management_level,
                backgroundColor: colors_management_level,
            },
        ],
    };

    new Chart(pieChartCanvas8, {
        type: "pie",
        data: pieData8,
        options: pieOptions,
    });

    //Pie 9 -- 6
    var pieChartCanvas9 = $("#pieChart9").get(0).getContext("2d");
    var pieData9 = {
        labels: labels_job_condition,
        datasets: [
            {
                data: data_job_condition,
                backgroundColor: colors_job_condition,
            },
        ],
    };

    new Chart(pieChartCanvas9, {
        type: "pie",
        data: pieData9,
        options: pieOptions,
    });

    //Pie 10 -- 7
    var pieChartCanvas10 = $("#pieChart10").get(0).getContext("2d");
    var pieData10 = {
        labels: labels_job_relationship,
        datasets: [
            {
                data: data_job_relationship,
                backgroundColor: colors_job_relationship,
            },
        ],
    };

    new Chart(pieChartCanvas10, {
        type: "pie",
        data: pieData10,
        options: pieOptions,
    });

    //Pie 11 -- 8
    var pieChartCanvas11 = $("#pieChart11").get(0).getContext("2d");
    var pieData11 = {
        labels: labels_business_structure,
        datasets: [
            {
                data: data_business_structure,
                backgroundColor: colors_business_structure,
            },
        ],
    };

    new Chart(pieChartCanvas11, {
        type: "pie",
        data: pieData11,
        options: pieOptions,
    });

    //Pie 12 -- 9
    var pieChartCanvas12 = $("#pieChart12").get(0).getContext("2d");
    var pieData12 = {
        labels: labels_company_size,
        datasets: [
            {
                data: data_company_size,
                backgroundColor: colors_company_size,
            },
        ],
    };

    new Chart(pieChartCanvas12, {
        type: "pie",
        data: pieData12,
        options: pieOptions,
    });

    //-------------
    //- BAR CHART -
    //-------------

    var barOption = {
        legend: {
            display: false,
        },
    };
    var barOptionVertical = {
        legend: {
            display: false,
        },
        scales: {
            xAxes: [
                {
                    ticks: {
                        autoSkip: false,
                        maxRotation: 90,
                        minRotation: 90,
                    },
                },
            ],
        },
    };

    //Bar Chart 1
    var barChartCanvas1 = $("#barChart1").get(0).getContext("2d");
    var barData1 = {
        labels: labels_year,
        datasets: [
            {
                data: data_year,
                backgroundColor: colors_year,
            },
        ],
    };

    new Chart(barChartCanvas1, {
        type: "bar",
        data: barData1,
        options: barOption,
    });

    //Bar Chart 2
    var barChartCanvas2 = $("#barChart2").get(0).getContext("2d");
    var barData2 = {
        labels: labels_business_activity_selector,
        datasets: [
            {
                data: data_business_activity_selector,
                backgroundColor: colors_business_activity_selector,
            },
        ],
    };

    new Chart(barChartCanvas2, {
        type: "bar",
        data: barData2,
        options: barOptionVertical,
    });
}

$("#print_button").click(function () {
    window.print();
});
