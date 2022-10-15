const options = {
    maintainAspectRatio: false,
    responsive: true,
    plugins: {
        datalabels: {
            formatter: (value, categories) => {
                let sum = 0;
                let dataArr = categories.chart.data.datasets[0].data;
                dataArr.map((data) => sum += data);
                let percentage = ((value * 100) / sum).toFixed(2) + "%";
                return percentage;
            },
            color: "#fff",
            font: {
                weight: "bold",
                size: 12,
            },
        },
    },
};

const barOptions = {
    legend: {
        display: false,
    },
    plugins: {
        datalabels: {
            formatter: (value, categories) => {
                let sum = 0;
                let dataArr = categories.chart.data.datasets[0].data;
                dataArr.map((data) => sum += data);
                let percentage = ((value * 100) / sum).toFixed(2) + "%";
                return percentage;
            },
            color: "#fff",
            font: {
                weight: "bold",
                size: 12,
            },
        },
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
        
        yAxes: [{
            ticks: {
                beginAtZero: true,
                min: 0
            }
        }]
    },
};

export default class ChartSSE {
    constructor(ref, type, dataChart) {
        this.ref = ref;
        this.type = type;
        this.dataChart = dataChart;
        this.chart = null;
        this.drawChart();
    }

    handleColorArray = (length) => {
        const colorArray = randomColor({
            count: length,
            // luminosity: 'light',
            hue: 'blue'
        });
        return colorArray;
    }

    drawChart = () => {
        if (this.chart !== null) {
            this.chart.destroy();
            this.chart = null;
        }

        const array = this.dataChart;

        const labels = array.map(item => item.label);
        const values = array.map(item => item.total);
        const colors = this.handleColorArray(values.length);

        const data = {
            labels: labels,
            datasets: [
                { data: values, backgroundColor: colors }
            ]
        };

        const canva = $(`#${this.ref}`).get(0).getContext('2d');

        this.chart = new Chart(canva, {
            type: this.type,
            data: data,
            options: this.type === 'bar' ? barOptions : options
        });

    }

    updateChart = (newData) => {
        if (newData) this.dataChart = newData;

        this.drawChart();
    }
}


