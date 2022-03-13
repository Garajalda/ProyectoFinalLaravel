@extends('layouts.app')
@section('content')

<div class="row">
    
    <div class="col-6">
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" src="images/1.png" alt="" width="60">
            </div>
            <div class="col-10">
                <h5>Informes</h5>
                <p>Reciba informes que necesite.</p>

            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" src="images/2.png" alt="" width="60">
            </div>
            <div class="col-10">
            <h5>Creación de usuarios</h5>
            <p>Cree usuarios que estén colaborando con su proyecto.</p>

            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <img class="img-fluid" src="images/3.png" alt="" width="60">
            </div>
            <div class="col-10">
            <h5>Soporte técnico</h5>
            <p>Facilitamos ayuda para quien la necesite.</p>

            </div>
        </div>
        

    </div>
    <div class="col-6">
        <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Usuarios de prueba
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                
                <p>Loggin: support@gmail.com</p>
                <p>Loggin: support2@gmail.com</p>
                <p>Loggin: cliente@gmail.com</p>
                <p>Loggin: admin@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Contraseñas
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <p>Password: 12345678</p>
                
            </div>
        </div>
        
        </div>

            </div>

    

</div>

    
    






        
@endsection