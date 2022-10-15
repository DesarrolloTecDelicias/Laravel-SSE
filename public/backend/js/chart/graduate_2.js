function charts_two(
    array_quality_teachers,
    array_syllabus,
    array_study_condition,
    array_experience,
    array_study_emphasis,
    array_participate_projects
) {
    var labels_quality_teachers = array_quality_teachers.map(
        (a) => a.quality_teachers
    );
    var data_quality_teachers = array_quality_teachers.map((a) => a.total);
    var colors_quality_teachers = randomColor({
        luminosity: "light",
        count: data_quality_teachers.length,
    });

    var labels_syllabus = array_syllabus.map((a) => a.syllabus);
    var data_syllabus = array_syllabus.map((a) => a.total);
    var colors_syllabus = randomColor({
        luminosity: "light",
        count: data_syllabus.length,
    });

    var labels_study_condition = array_study_condition.map(
        (a) => a.study_condition
    );
    var data_study_condition = array_study_condition.map((a) => a.total);
    var colors_study_condition = randomColor({
        luminosity: "light",
        count: data_study_condition.length,
    });

    var labels_experience = array_experience.map((a) => a.experience);
    var data_experience = array_experience.map((a) => a.total);
    var colors_experience = randomColor({
        luminosity: "light",
        count: data_experience.length,
    });

    var labels_study_emphasis = array_study_emphasis.map(
        (a) => a.study_emphasis
    );
    var data_study_emphasis = array_study_emphasis.map((a) => a.total);
    var colors_study_emphasis = randomColor({
        luminosity: "light",
        count: data_study_emphasis.length,
    });

    var labels_participate_projects = array_participate_projects.map(
        (a) => a.participate_projects
    );
    var data_participate_projects = array_participate_projects.map(
        (a) => a.total
    );
    var colors_participate_projects = randomColor({
        luminosity: "light",
        count: data_participate_projects.length,
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
        labels: labels_quality_teachers,
        datasets: [
            {
                data: data_quality_teachers,
                backgroundColor: colors_quality_teachers,
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
        labels: labels_syllabus,
        datasets: [
            {
                data: data_syllabus,
                backgroundColor: colors_syllabus,
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
        labels: labels_study_condition,
        datasets: [
            {
                data: data_study_condition,
                backgroundColor: colors_study_condition,
            },
        ],
    };

    new Chart(pieChartCanvas3, {
        type: "pie",
        data: pieData3,
        options: pieOptions,
    });

    //Pie 4
    var pieChartCanvas4 = $("#pieChart4").get(0).getContext("2d");
    var pieData4 = {
        labels: labels_experience,
        datasets: [
            {
                data: data_experience,
                backgroundColor: colors_experience,
            },
        ],
    };

    new Chart(pieChartCanvas4, {
        type: "pie",
        data: pieData4,
        options: pieOptions,
    });

    //Pie 5
    var pieChartCanvas5 = $("#pieChart5").get(0).getContext("2d");
    var pieData5 = {
        labels: labels_study_emphasis,
        datasets: [
            {
                data: data_study_emphasis,
                backgroundColor: colors_study_emphasis,
            },
        ],
    };

    new Chart(pieChartCanvas5, {
        type: "pie",
        data: pieData5,
        options: pieOptions,
    });

    //Pie 6
    var pieChartCanvas6 = $("#pieChart6").get(0).getContext("2d");
    var pieData6 = {
        labels: labels_participate_projects,
        datasets: [
            {
                data: data_participate_projects,
                backgroundColor: colors_participate_projects,
            },
        ],
    };

    new Chart(pieChartCanvas6, {
        type: "pie",
        data: pieData6,
        options: pieOptions,
    });
}

$("#print_button").click(function () {
    window.print();
});
