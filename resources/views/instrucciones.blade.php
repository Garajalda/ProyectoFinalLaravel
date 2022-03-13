@extends('layouts.app')
@section('content')

<div class="row">

    <div class="col">
        <h5>Instrucciones</h5>
        <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Usuarios de prueba
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                
                <p>Loggin: support1@gmail.com</p>
                <p>Loggin: support2@gmail.com</p>
                <p>Loggin: cliente@gmail.com</p>
                <p>Loggin: admin@gmail.com</p>
                </div>
            </div>
        </div>
        

        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Para administradores
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <p>El administrador se encarga de crear proyectos y enlazarlos con los usuarios.</p>
                
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Para soporte
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <p>En soporte se pueden ver las diferentes incidencias pero solo si pertenecen al mismo nivel.</p>
                
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Para clientes
            </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <p>Los clientes verán todos los proyectos, podrán crear incidencias pero solo podrán ver sus propias incidencias y si están resueltas.</p>
                
            </div>
        </div>
        
        
        </div>

            </div>

    

</div>

    
    






        
@endsection