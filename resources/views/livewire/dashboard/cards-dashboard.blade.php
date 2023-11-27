<div>

    <head>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <style>
            ion-icon {
                font-size: 80px;
            }
        </style>
    </head>
    <div class="pt-3"></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info rounded">
                        <div class="d-flex justify-content-between px-3 py-3">
                            <div class="inner">
                                <h2> {{ $this->departamentos }} </h2>
                                <p style="color: white; font-weight: bold"> Departamentos</p>
                            </div>
                            <div>
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                        </div>
                        <div style="text-align: right; " class="px-3">
                            <a href="{{ url('/departments') }}" class="small-box-footer">
                                Mas Información
                                <i class="fas fa-arrow-circle-right mr-0"></i>
                            </a>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success rounded">
                        <div class="d-flex justify-content-between px-3 py-3">
                            <div class="inner">
                                <h2> {{ $this->cargos }} </h2>
                                <p style="color: white; font-weight: bold"> Cargos</p>
                            </div>
                            <div>
                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                        </div>
                       <div style="text-align: right; " class="px-3">
                        <a href="{{ url('/cargos') }}" class="small-box-footer">
                            Mas Información
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                       </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning rounded">
                        <div class="d-flex justify-content-between px-3 py-3">
                            <div class="inner">
                                <h2> {{ $this->empleados }} </h2>
                                <p style="color: white; font-weight: bold"> Empleados </p>
                            </div>
                            <div>
                                <ion-icon name="person-circle-outline"></ion-icon>
                            </div>
                        </div>
                        <div style="text-align: right; " class="px-3">
                            <a href="{{ url('/empleados') }}" class="small-box-footer">
                                Mas Información
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger rounded">
                        <div class="d-flex justify-content-between px-3 py-3">
                            <div class="inner">
                                <h2> {{ $this->postulantes }} </h2>
                                <p style="color: white; font-weight: bold"> Postulantes</p>
                            </div>
                            <div>
                                <ion-icon name="locate-outline"></ion-icon>
                            </div>
                        </div>
                        <div style="text-align: right; " class="px-3">
                            <a href="{{ url('/postulantes') }}" class="small-box-footer">
                                Mas Información
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
