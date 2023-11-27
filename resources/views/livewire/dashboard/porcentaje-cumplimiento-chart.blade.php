<div>
    <div class="py-1">
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Porcentaje de Cumplimiento de Asistencias</h3>
        </div>
        <div class="card-body px-3" style="align-items: center">
            {{-- <h1 style="display: flex;justify-content: center">{{ $this->api }}</h1> --}}
            <h2 class="py-4"
                style="display: flex; justify-content: center ; font-weight: bold; color: rgb(75, 192, 192)">
                Cumplimiento de Asistencias</h2>
            {{-- <div class="row py-4">
                <div class="col-md-3">
                    <label>Peticion:</label>
                    <select class="form-control" id="exampleFormControlSelect1" wire:model="api">
                        <option selected value="">Todo</option>
                        @foreach ($apis as $api)
                        <option value="{{ $api->request }}">{{ $api->request }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <label>Intervalo:</label>
                    <select class="form-control" id="exampleFormControlSelect1" wire:model="interval">
                        <option value="1">Hora</option>
                        <option value="2">Dia</option>
                        <option value="3">Mes</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="start_date">Fecha y hora Inicio:</label>
                    <input class="form-control @error('start_date') is-invalid @enderror" wire:model="start_date"
                        type="datetime-local" id="start_date" name="start_date">
                    @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="end_date">Fecha y hora Fin:</label>
                    <input class="form-control @error('end_date') is-invalid @enderror" wire:model="end_date"
                        type="datetime-local" id="end_date" name="end_date">
                    @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
            <div style="justify-content: center; display: flex">
                <div style="margin-top: 20px; align-items: center; width: 40%">
                    <canvas id="pieChart"></canvas>
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
                                    'rgb(141,187,37)',
                                    'rgb(255, 99, 132)',
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
