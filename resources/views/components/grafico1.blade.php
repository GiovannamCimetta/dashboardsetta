{{-- <meta HTTP-EQUIV='refresh' CONTENT='30'> --}}

<button id="cadastro1" class="btn-floating btn btn-lg" type="button" onclick="window.location='{{ route('machines.create') }}'"> <i class="bi bi-plus"></i> </button>
<button id="atualizar-todos" class="btn-floating btn btn-lg" type="button"> <i class="bi bi-arrow-repeat"></i> </button>
    <div class="container">
        <br>
        <h1>Tabela 1</h1>
        <canvas id="efficiencyChart"></canvas>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const updateData = () => {
            // Fetch data and update the DOM
            fetch('/api/machine-data')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('last_update').innerText = data.last_update;
                    document.getElementById('last_temperature').innerText = data.last_temperature;
                    document.getElementById('last_efficiency').innerText = data.last_efficiency;

                    const ctx = document.getElementById('efficiencyChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels1,
                            datasets: [{
                                label: 'Temperatura (°C)',
                                data: data.temperatures,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 2,
                                fill: true
                            }, {
                                label: 'Eficiência (%)',
                                data: data.efficiencies,
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 2,
                                fill: true
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Temperatura (°C) - hora e data do registro'
                                    }
                                },
                                y: {
                                    beginAtZero: true,title: {
                                        display: true,
                                        text: 'Eficiencia (%)'
                                    }
                                }
                            },plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            const machine = data.machines[tooltipItem.dataIndex];
                                            return [
                                                `Temperatura: ${machine.temperatures}°C`,
                                                `Eficiência: ${machine.Eficiencia}%`,
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
        updateData();
    </script>

