

const renderChart = datosGrafica => {

    const data = {
        labels: [...new Set(datosGrafica.map(d => d.source))],
        datasets: [{
            data: [...new Set(datosGrafica.map(d => d.valor))],
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

    new Chart('modelsChart', { type: 'doughnut', data, options })
}