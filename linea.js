const seccionDatos = document.getElementById('seccion-datos');
const seccionProblema = document.getElementById('seccion-problema');
const btnSiguiente = document.getElementById('btnSiguiente');
const inputsDatos = seccionDatos.querySelectorAll('input');
const txtProblema = document.getElementById('problema');
const form = document.getElementById('bullyingForm');


function mostrarSiguienteSeccion() {
    let valido = true;
    
    inputsDatos.forEach(input => {
        if (!input.value.trim()) {
            valido = false;
            input.reportValidity();
        }
    });

    if (valido) {
        seccionDatos.classList.add('hidden');
        seccionProblema.classList.remove('hidden');
        seccionProblema.classList.add('fade-in');
        txtProblema.focus(); 
    }
}

btnSiguiente.addEventListener('click', mostrarSiguienteSeccion);

inputsDatos.forEach(input => {
    input.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            mostrarSiguienteSeccion();
        }
    });
});

form.addEventListener('submit', function() {
    alert('Gracias. Tu reporte ha sido registrado de forma segura.');
    form.reset();
    seccionProblema.classList.add('hidden');
    seccionDatos.classList.remove('hidden');
});