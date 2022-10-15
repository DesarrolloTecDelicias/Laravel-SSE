function charts_four(
    array_efficiency_work_activities,
    array_academic_training,
    array_usefulness_professional_residence,
    array_study_area,
    array_title,
    array_experience,
    array_job_competence,
    array_positioning,
    array_languages,
    array_recommendations,
    array_personality,
    array_leadership,
    array_others
) {
    var labels_efficiency_work_activities =
        array_efficiency_work_activities.map(
            (a) => a.efficiency_work_activities
        );
    var data_efficiency_work_activities = array_efficiency_work_activities.map(
        (a) => a.total
    );
    var colors_efficiency_work_activities = randomColor({
        luminosity: "light",
        count: data_efficiency_work_activities.length,
    });

    var labels_academic_training = array_academic_training.map(
        (a) => a.academic_training
    );
    var data_academic_training = array_academic_training.map((a) => a.total);
    var colors_academic_training = randomColor({
        luminosity: "light",
        count: data_academic_training.length,
    });

    var labels_usefulness_professional_residence =
        array_usefulness_professional_residence.map(
            (a) => a.usefulness_professional_residence
        );
    var data_usefulness_professional_residence =
        array_usefulness_professional_residence.map((a) => a.total);
    var colors_usefulness_professional_residence = randomColor({
        luminosity: "light",
        count: data_usefulness_professional_residence.length,
    });

    var labels_study_area = array_study_area.map((a) => a.study_area);
    var data_study_area = array_study_area.map((a) => a.total);
    var colors_study_area = randomColor({
        luminosity: "light",
        count: data_study_area.length,
    });

    var labels_title = array_title.map((a) => a.title);
    var data_title = array_title.map((a) => a.total);
    var colors_title = randomColor({
        luminosity: "light",
        count: data_title.length,
    });

    var labels_experience = array_experience.map((a) => a.experience);
    var data_experience = array_experience.map((a) => a.total);
    var colors_experience = randomColor({
        luminosity: "light",
        count: data_experience.length,
    });

    var labels_job_competence = array_job_competence.map(
        (a) => a.job_competence
    );
    var data_job_competence = array_job_competence.map((a) => a.total);
    var colors_job_competence = randomColor({
        luminosity: "light",
        count: data_job_competence.length,
    });

    var labels_positioning = array_positioning.map((a) => a.positioning);
    var data_positioning = array_positioning.map((a) => a.total);
    var colors_positioning = randomColor({
        luminosity: "light",
        count: data_positioning.length,
    });

    var labels_languages = array_languages.map((a) => a.languages);
    var data_languages = array_languages.map((a) => a.total);
    var colors_languages = randomColor({
        luminosity: "light",
        count: data_languages.length,
    });

    var labels_recommendations = array_recommendations.map(
        (a) => a.recommendations
    );
    var data_recommendations = array_recommendations.map((a) => a.total);
    var colors_recommendations = randomColor({
        luminosity: "light",
        count: data_recommendations.length,
    });

    var labels_personality = array_personality.map((a) => a.personality);
    var data_personality = array_personality.map((a) => a.total);
    var colors_personality = randomColor({
        luminosity: "light",
        count: data_personality.length,
    });

    var labels_leadership = array_leadership.map((a) => a.leadership);
    var data_leadership = array_leadership.map((a) => a.total);
    var colors_leadership = randomColor({
        luminosity: "light",
        count: data_leadership.length,
    });

    var labels_others = array_others.map((a) => a.others);
    var data_others = array_others.map((a) => a.total);
    var colors_others = randomColor({
        luminosity: "light",
        count: data_others.length,
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
        labels: labels_efficiency_work_activities,
        datasets: [
            {
                data: data_efficiency_work_activities,
                backgroundColor: colors_efficiency_work_activities,
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
        labels: labels_academic_training,
        datasets: [
            {
                data: data_academic_training,
                backgroundColor: colors_academic_training,
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
        labels: labels_usefulness_professional_residence,
        datasets: [
            {
                data: data_usefulness_professional_residence,
                backgroundColor: colors_usefulness_professional_residence,
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
        labels: labels_study_area,
        datasets: [
            {
                data: data_study_area,
                backgroundColor: colors_study_area,
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
        labels: labels_title,
        datasets: [
            {
                data: data_title,
                backgroundColor: colors_title,
            },
        ],
    };

    new Chart(pieChartCanvas5, {
        type: "pie",
        data: pieData5,
        options: pieOptions,
    });

    //Pie 6 -- 3
    var pieChartCanvas6 = $("#pieChart6").get(0).getContext("2d");
    var pieData6 = {
        labels: labels_experience,
        datasets: [
            {
                data: data_experience,
                backgroundColor: colors_experience,
            },
        ],
    };

    new Chart(pieChartCanvas6, {
        type: "pie",
        data: pieData6,
        options: pieOptions,
    });

    //Pie 7 -- 4
    var pieChartCanvas7 = $("#pieChart7").get(0).getContext("2d");
    var pieData7 = {
        labels: labels_job_competence,
        datasets: [
            {
                data: data_job_competence,
                backgroundColor: colors_job_competence,
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
        labels: labels_positioning,
        datasets: [
            {
                data: data_positioning,
                backgroundColor: colors_positioning,
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
        labels: labels_languages,
        datasets: [
            {
                data: data_languages,
                backgroundColor: colors_languages,
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
        labels: labels_recommendations,
        datasets: [
            {
                data: data_recommendations,
                backgroundColor: colors_recommendations,
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
        labels: labels_personality,
        datasets: [
            {
                data: data_personality,
                backgroundColor: colors_personality,
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
        labels: labels_leadership,
        datasets: [
            {
                data: data_leadership,
                backgroundColor: colors_leadership,
            },
        ],
    };

    new Chart(pieChartCanvas12, {
        type: "pie",
        data: pieData12,
        options: pieOptions,
    });

    //Pie 13 -- 10
    var pieChartCanvas13 = $("#pieChart13").get(0).getContext("2d");
    var pieData13 = {
        labels: labels_others,
        datasets: [
            {
                data: data_others,
                backgroundColor: colors_others,
            },
        ],
    };

    new Chart(pieChartCanvas13, {
        type: "pie",
        data: pieData13,
        options: pieOptions,
    });
}

$("#print_button").click(function () {
    window.print();
});
