

let myBubbleChart;
let data;

const renderChart = datosGrafica => {

    data = {
        labels: [...new Set(datosGrafica.map(d => d.source))],
        datasets: [{
            data: datosGrafica.map(d => d.valor),
            borderColor: [...new Set(datosGrafica.map(d => d.color))],
            backgroundColor: [...new Set(datosGrafica.map(d => d.color))]
        }]
    }
    console.log(data);

    const options = {
        plugins: {
            legend: { position: 'left' }
        },
        onClick: graphClickEvent
    }
    if(myBubbleChart instanceof Chart)
    {
        myBubbleChart.destroy();
    }
    
    myBubbleChart = new Chart('modelsChart', { type: 'doughnut', data, options })
}

function graphClickEvent(e, activeEls){
    
    let datasetIndex = activeEls[0].datasetIndex;
    let dataIndex = activeEls[0].index;
    
    let value = data.datasets[0].data[dataIndex];
    let label = data.labels[dataIndex];
    route_list = config.route
    route = route_list + "/"+ label +"/" + config.id_dpto;

    window.location.href = route;
}


let pieChart;

const renderChartPie = datosGrafica => {

    data = {
        labels: [...new Set(datosGrafica.map(d => d.label))],
        datasets: [{
            data: datosGrafica.map(d => d.valor),
            borderColor: [...new Set(datosGrafica.map(d => d.color))],
            backgroundColor: [...new Set(datosGrafica.map(d => d.color))]
        }]
    }
    console.log(data);

    const options = {
        plugins: {
            legend: { position: 'left' }
        }
    }
    if(pieChart instanceof Chart)
    {
        pieChart.destroy();
    }
    
    pieChart = new Chart('chartCanvas', { type: 'pie', data, options })
}
