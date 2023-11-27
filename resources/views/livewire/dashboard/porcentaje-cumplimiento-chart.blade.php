<div>
    <div class="py-1">
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Porcentaje de Cumplimiento de Asistencias</h3>
        </div>
        <div class="card-body px-3" style="align-items: center">
            <h2 class="py-4"
                style="display: flex; justify-content: center ; font-weight: bold; color: rgb(75, 192, 192)">
                Cumplimiento de Asistencias</h2>
            <div class="row py-2">
                <div class="col-md-3">
                    <label for="end_date">Fecha Inicio:</label>
                    <input class="form-control @error('end_date') is-invalid @enderror" wire:model="start_date"
                        type="date" id="start_date" name="start_date">
                    <div>
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="end_date">Fecha Fin:</label>
                    <input class="form-control @error('end_date') is-invalid @enderror" wire:model="end_date"
                        type="date" id="end_date" name="end_date">
                    <div>
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div style="margin-top: 24px">
                    @if ($conFiltroDate)
                        <button class="btn btn-secondary my-2 mr-1" wire:click='clearDateFilters()'>Limpiar Filtros de
                            fecha</button>
                    @endif
                </div>
            </div>
            <div class="row py-3">
                <div class="col-md-3">
                    <label>Departamentos:</label>
                    <select class="form-control" id="exampleFormControlSelect1" wire:model="departamento_id"
                        id="departamento_id" name="departamento_id">
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
                    <select class="form-control" id="exampleFormControlSelect1" wire:model="cargo_id" id="cargo_id"
                        name="cargo_id">
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
                <div class="col-md-3">
                    <label>Empleados:</label>
                    <select class="form-control" id="exampleFormControlSelect1" wire:model="empleado_id"
                        id="empleado_id" name="empleado_id">
                        <option selected value="">Todo</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('empleado_id')
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
            <div style="justify-content: center; display: flex">
                <div style="margin-top: 20px; align-items: center; width: 40%">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
            <div style="display: flex;align-items: center">
                <div style=" font-size: 15px">
                    <p style="font-weight: bold;color: rgb(75, 192, 192);">Total de asistencias:{{ $totalAsistencias }}</p>
                    <p style="font-weight: bold; color: rgb(141,187,37)"> Porcentaje de fechas Puntuales:{{ $avgFechaPuntual }} %</p>
                    <p style="font-weight: bold; color: rgb(245,54,92)">Porcentaje de fechas Impuntuales:{{ $avgFechaImpuntual }} %</p>
                </div>
            </div>
            <script>
                document.addEventListener('livewire:load', function() {

                    let pieChart = null;

                    draw(@json($data));

                    Livewire.on('draw', function(data) {
                        draw(data);
                    });

                    function draw(newData) {
                        let ctx = document.getElementById('pieChart').getContext('2d');

                        const data = {
                            labels: newData.labels,
                            datasets: [{
                                label: 'Nro. de asistencias',
                                data: newData.data,
                                borderColor: 'rgb(176,176,176)',
                                borderWidth: 2,
                                backgroundColor: [
                                    'rgb(141,187,37)', //puntuales
                                    'rgb(245,54,92)',   //impuntuales
                                ],
                                fill: false
                            }]
                        };

                        if (pieChart) {
                            pieChart.destroy()
                        }

                        pieChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: data,
                        });

                        pieChart.render();
                    }
                });
            </script>
        </div>
    </div>
</div>
