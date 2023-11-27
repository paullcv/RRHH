<div class="my-1">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Empleados Inactivos</h3>
        </div>
        <div class="card-body px-3">
            <h2 class="py-4" style="display: flex; justify-content: center; font-weight: bold; color: rgb(245,54,92)">
                Cantidad de Empleados Inactivos - {{$totalEmpleados}}
            </h2>

            <!-- Agrega esto donde quieras que aparezca el selector -->
            <div class="form-group">
                <label for="chartType">Selecciona:</label>
                <select class="form-control" id="chartType" wire:model="selectedChartType" style="width: 15%">
                    <option value="departamentos">Departamentos</option>
                    <option value="cargos">Cargos</option>
                </select>
            </div>


            <div style="width: 100%; margin: 0 auto; padding-bottom: 25px; height: 500px;">
                <canvas id="horizontalBarChart2" width="30%"></canvas>
            </div>
            <script>
                document.addEventListener('livewire:load', function() {
                    let horizontalBarChart2 = null;

                    draw(@json($data));
                    Livewire.on('drawEI', function(data) {
                        draw(data);
                    });

                    function draw(newData) {
                        var ctx = document.getElementById('horizontalBarChart2').getContext('2d');
                        var chartData = {
                            labels: newData.labels,
                            datasets: [{
                                label: 'Cantidad de Empleados inactivos',
                                data: newData.data,
                                backgroundColor: 'rgb(245,54,92)',
                                borderColor: 'rgb(176,176,176)',
                                borderWidth: 1
                            }]
                        };

                        var chartOptions = {
                            indexAxis: 'y',
                            scales: {
                                x: {
                                    beginAtZero: true
                                }
                            }
                        };

                        if (horizontalBarChart2) {
                            horizontalBarChart2.destroy()
                        }

                        horizontalBarChart2 = new Chart(ctx, {
                            type: 'bar',
                            data: chartData,
                            options: chartOptions
                        });

                        horizontalBarChart2.render();

                    }
                });
            </script>

        </div>
    </div>
</div>
