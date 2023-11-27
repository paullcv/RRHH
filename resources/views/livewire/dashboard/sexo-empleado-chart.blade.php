<div class="my-1">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Genero de Empleados</h3>
        </div>
        <div class="card-body px-3">
            <h2 class="py-4" style="display: flex; justify-content: center; font-weight: bold; color: #FF8A8A">
                Genero de Empleados
            </h2>

            <div class="row py-2">
                <div class="col-md-3">
                    <label>Departamentos:</label>
                    <select class="form-control" wire:model="departamento_id"
                        wire:change="selectDepartamento($event.target.value)">
                        <option selected value="">Todo</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('departamento_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <label>Cargos:</label>
                    <select class="form-control" wire:model="cargo_id" wire:change="selectCargo($event.target.value)">
                        <option selected value="">Todo</option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('cargo_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div style="margin-top: 24px">
                    @if ($conFiltroSelect)
                        <button class="btn btn-secondary my-2 mr-1" wire:click='clearSelectFilters()'>Limpiar
                            Selecciones</button>
                    @endif
                </div>

            </div>

            <div style="width: 50%; margin: 0 auto; padding-bottom: 25px">
                <canvas id="BarChart"></canvas>
            </div>
            <script>
                document.addEventListener('livewire:load', function() {
                    let BarChart = null;

                    draw(@json($data));
                    Livewire.on('drawGE', function(data) {
                        draw(data);
                    });

                    function draw(newData) {
                        var ctx = document.getElementById('BarChart').getContext('2d');
                        var chartData = {
                            labels: newData.labels,
                            datasets: [{
                                label: 'Nro. de Empleados',
                                data: newData.data,
                                backgroundColor: 'rgb(251,99,64)',
                                borderColor: 'rgb(176,176,176)',
                                borderWidth: 1
                            }]
                        };
                        var chartOptions = {
                            indexAxis: 'x', // Cambiado a 'x' para colocar las etiquetas en el eje y
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        };
                        if (BarChart) {
                            BarChart.destroy()
                        }

                        BarChart = new Chart(ctx, {
                            type: 'bar',
                            data: chartData,
                            options: chartOptions
                        });

                        BarChart.render();
                    }
                });
            </script>


        </div>
    </div>
</div>
