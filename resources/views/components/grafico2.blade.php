
    <div class="container">
<br>
        <h1>Tabela 2</h1>
        <canvas id="efficiencyVsTemperatureChart"></canvas>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const updateData1 = () => {
            fetch('/api/machine-data')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('last_update').innerText = data.last_update;
                    document.getElementById('last_temperature').innerText = data.last_temperature;
                    document.getElementById('last_efficiency').innerText = data.last_efficiency;



                    const barCtx = document.getElementById('efficiencyVsTemperatureChart').getContext('2d');
                    new Chart(barCtx, {
                        type: 'bar',
                        data: {
                            labels: data.temperatures,
                            datasets: [{
                                label: 'Eficiência (%)',
                                data: data.efficiencies,
                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 1,
                                customTooltips: data.machines
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Temperatura (°C)'
                                    }
                                },
                                y: {
                                    beginAtZero: true,title: {
                                        display: true,
                                        text: 'Eficiencia (%)'
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            const machine = data.machines[tooltipItem.dataIndex];
                                            return [
                                                `Temperatura: ${tooltipItem.label}°C`,
                                                `Eficiência: ${tooltipItem.raw}%`,
                                                `Fabricante: ${machine.Fabricante}`,
                                                `Código da Máquina: ${machine.Codigo_Maquina}`,
                                                `Cidade: ${machine.Cidade}`
                                            ];
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
        };

        setInterval(updateData, 30000);
        updateData1();
    </script>
