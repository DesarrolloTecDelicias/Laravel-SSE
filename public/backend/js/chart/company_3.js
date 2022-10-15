function charts_three(array_resolve_conflicts, array_orthography, array_process_improvement, array_teamwork,
    array_time_management, array_security, array_ease_speech, array_project_management, array_puntuality, array_rules, array_integration_work,
    array_creativity, array_bargaining, array_abstraction, array_leadership, array_changes, array_job_performance) {

    var labels_resolve_conflicts = array_resolve_conflicts.map(a => a.resolve_conflicts);
    var data_resolve_conflicts = array_resolve_conflicts.map(a => a.total);
    var colors_resolve_conflicts = randomColor({
        luminosity: 'light',
        count: data_resolve_conflicts.length
    });

    var labels_orthography = array_orthography.map(a => a.orthography);
    var data_orthography = array_orthography.map(a => a.total);
    var colors_orthography = randomColor({
        luminosity: 'light',
        count: data_orthography.length
    });

    var labels_process_improvement = array_process_improvement.map(a => a.process_improvement);
    var data_process_improvement = array_process_improvement.map(a => a.total);
    var colors_process_improvement = randomColor({
        luminosity: 'light',
        count: data_process_improvement.length
    });

    var labels_teamwork = array_teamwork.map(a => a.teamwork);
    var data_teamwork = array_teamwork.map(a => a.total);
    var colors_teamwork = randomColor({
        luminosity: 'light',
        count: data_teamwork.length
    });

    var labels_time_management = array_time_management.map(a => a.time_management);
    var data_time_management = array_time_management.map(a => a.total);
    var colors_time_management = randomColor({
        luminosity: 'light',
        count: data_time_management.length
    });

    var labels_security = array_security.map(a => a.security);
    var data_security = array_security.map(a => a.total);
    var colors_security = randomColor({
        luminosity: 'light',
        count: data_security.length
    });

    var labels_ease_speech = array_ease_speech.map(a => a.ease_speech);
    var data_ease_speech = array_ease_speech.map(a => a.total);
    var colors_ease_speech = randomColor({
        luminosity: 'light',
        count: data_ease_speech.length
    });

    var labels_project_management = array_project_management.map(a => a.project_management);
    var data_project_management = array_project_management.map(a => a.total);
    var colors_project_management = randomColor({
        luminosity: 'light',
        count: data_project_management.length
    });

    var labels_puntuality = array_puntuality.map(a => a.puntuality);
    var data_puntuality = array_puntuality.map(a => a.total);
    var colors_puntuality = randomColor({
        luminosity: 'light',
        count: data_puntuality.length
    });

    var labels_rules = array_rules.map(a => a.rules);
    var data_rules = array_rules.map(a => a.total);
    var colors_rules = randomColor({
        luminosity: 'light',
        count: data_rules.length
    });

    var labels_integration_work = array_integration_work.map(a => a.integration_work);
    var data_integration_work = array_integration_work.map(a => a.total);
    var colors_integration_work = randomColor({
        luminosity: 'light',
        count: data_integration_work.length
    });

    var labels_creativity = array_creativity.map(a => a.creativity);
    var data_creativity = array_creativity.map(a => a.total);
    var colors_creativity = randomColor({
        luminosity: 'light',
        count: data_creativity.length
    });

    var labels_bargaining = array_bargaining.map(a => a.bargaining);
    var data_bargaining = array_bargaining.map(a => a.total);
    var colors_bargaining = randomColor({
        luminosity: 'light',
        count: data_bargaining.length
    });

    var labels_abstraction = array_abstraction.map(a => a.abstraction);
    var data_abstraction = array_abstraction.map(a => a.total);
    var colors_abstraction = randomColor({
        luminosity: 'light',
        count: data_abstraction.length
    });

    var labels_leadership = array_leadership.map(a => a.leadership);
    var data_leadership = array_leadership.map(a => a.total);
    var colors_leadership = randomColor({
        luminosity: 'light',
        count: data_leadership.length
    });

    var labels_changes = array_changes.map(a => a.changes);
    var data_changes = array_changes.map(a => a.total);
    var colors_changes = randomColor({
        luminosity: 'light',
        count: data_changes.length
    });

    var labels_job_performance = array_job_performance.map(a => a.job_performance);
    var data_job_performance = array_job_performance.map(a => a.total);
    var colors_job_performance = randomColor({
        luminosity: 'light',
        count: data_job_performance.length
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
        labels: labels_resolve_conflicts,
        datasets: [{
            data: data_resolve_conflicts,
            backgroundColor: colors_resolve_conflicts,
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
        labels: labels_orthography,
        datasets: [{
            data: data_orthography,
            backgroundColor: colors_orthography,
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
        labels: labels_process_improvement,
        datasets: [{
            data: data_process_improvement,
            backgroundColor: colors_process_improvement,
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
        labels: labels_teamwork,
        datasets: [{
            data: data_teamwork,
            backgroundColor: colors_teamwork,
        }]
    }

    new Chart(pieChartCanvas4, {
        type: 'pie',
        data: pieData4,
        options: pieOptions
    });


    //Pie 5
    var pieChartCanvas5 = $('#pieChart5').get(0).getContext('2d')
    var pieData5 = {
        labels: labels_time_management,
        datasets: [{
            data: data_time_management,
            backgroundColor: colors_time_management,
        }]
    }

    new Chart(pieChartCanvas5, {
        type: 'pie',
        data: pieData5,
        options: pieOptions
    });


    //Pie 6
    var pieChartCanvas6 = $('#pieChart6').get(0).getContext('2d')
    var pieData6 = {
        labels: labels_security,
        datasets: [{
            data: data_security,
            backgroundColor: colors_security,
        }]
    }

    new Chart(pieChartCanvas6, {
        type: 'pie',
        data: pieData6,
        options: pieOptions
    });


    //Pie 7
    var pieChartCanvas7 = $('#pieChart7').get(0).getContext('2d')
    var pieData7 = {
        labels: labels_ease_speech,
        datasets: [{
            data: data_ease_speech,
            backgroundColor: colors_ease_speech,
        }]
    }

    new Chart(pieChartCanvas7, {
        type: 'pie',
        data: pieData7,
        options: pieOptions
    });


    //Pie 8
    var pieChartCanvas8 = $('#pieChart8').get(0).getContext('2d')
    var pieData8 = {
        labels: labels_project_management,
        datasets: [{
            data: data_project_management,
            backgroundColor: colors_project_management,
        }]
    }

    new Chart(pieChartCanvas8, {
        type: 'pie',
        data: pieData8,
        options: pieOptions
    });


    //Pie 9
    var pieChartCanvas9 = $('#pieChart9').get(0).getContext('2d')
    var pieData9 = {
        labels: labels_puntuality,
        datasets: [{
            data: data_puntuality,
            backgroundColor: colors_puntuality,
        }]
    }

    new Chart(pieChartCanvas9, {
        type: 'pie',
        data: pieData9,
        options: pieOptions
    });


    //Pie 10
    var pieChartCanvas10 = $('#pieChart10').get(0).getContext('2d')
    var pieData10 = {
        labels: labels_rules,
        datasets: [{
            data: data_rules,
            backgroundColor: colors_rules,
        }]
    }

    new Chart(pieChartCanvas10, {
        type: 'pie',
        data: pieData10,
        options: pieOptions
    });


    //Pie 11
    var pieChartCanvas11 = $('#pieChart11').get(0).getContext('2d')
    var pieData11 = {
        labels: labels_integration_work,
        datasets: [{
            data: data_integration_work,
            backgroundColor: colors_integration_work,
        }]
    }

    new Chart(pieChartCanvas11, {
        type: 'pie',
        data: pieData11,
        options: pieOptions
    });


    //Pie 12
    var pieChartCanvas12 = $('#pieChart12').get(0).getContext('2d')
    var pieData12 = {
        labels: labels_creativity,
        datasets: [{
            data: data_creativity,
            backgroundColor: colors_creativity,
        }]
    }

    new Chart(pieChartCanvas12, {
        type: 'pie',
        data: pieData12,
        options: pieOptions
    });


    //Pie 13
    var pieChartCanvas13 = $('#pieChart13').get(0).getContext('2d')
    var pieData13 = {
        labels: labels_bargaining,
        datasets: [{
            data: data_bargaining,
            backgroundColor: colors_bargaining,
        }]
    }

    new Chart(pieChartCanvas13, {
        type: 'pie',
        data: pieData13,
        options: pieOptions
    });

    //Pie 14
    var pieChartCanvas14 = $('#pieChart14').get(0).getContext('2d')
    var pieData14 = {
        labels: labels_abstraction,
        datasets: [{
            data: data_abstraction,
            backgroundColor: colors_abstraction,
        }]
    }

    new Chart(pieChartCanvas14, {
        type: 'pie',
        data: pieData14,
        options: pieOptions
    });

    //Pie 15
    var pieChartCanvas15 = $('#pieChart15').get(0).getContext('2d')
    var pieData15 = {
        labels: labels_leadership,
        datasets: [{
            data: data_leadership,
            backgroundColor: colors_leadership,
        }]
    }

    new Chart(pieChartCanvas15, {
        type: 'pie',
        data: pieData15,
        options: pieOptions
    });

    //Pie 16
    var pieChartCanvas16 = $('#pieChart16').get(0).getContext('2d')
    var pieData16 = {
        labels: labels_changes,
        datasets: [{
            data: data_changes,
            backgroundColor: colors_changes,
        }]
    }

    new Chart(pieChartCanvas16, {
        type: 'pie',
        data: pieData16,
        options: pieOptions
    });

    //Pie 17
    var pieChartCanvas17 = $('#pieChart17').get(0).getContext('2d')
    var pieData17 = {
        labels: labels_job_performance,
        datasets: [{
            data: data_job_performance,
            backgroundColor: colors_job_performance,
        }]
    }

    new Chart(pieChartCanvas17, {
        type: 'pie',
        data: pieData17,
        options: pieOptions
    });
};

$("#print_button").click(function () {
    window.print();
});
