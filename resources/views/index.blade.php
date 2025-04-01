@extends('sidebar')

@section('title', 'Dashboard')

@section('estilos_adicionales')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        #inicio { 
            background-color: rgb(223, 229, 255); 
        }

        .stats .card {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
    </style>
@endsection

@section('contenido')
<div class="container">
    <div class="breadcrumb">
        <span>Dashboard</span> &gt; <span>Análisis</span> &gt;
        <span class="active">Tendencias del estado de ánimo</span>
    </div>

    <div class="tabs">
        <button class="tab active" onclick="cambiarTab('semanal')">Semanalmente</button>
        <button class="tab" onclick="cambiarTab('mensual')">Mensualmente</button>
        <button class="tab" onclick="cambiarTab('trimestral')">Trimestral</button>
    </div>

    <div class="stats" id="estadisticas">
        <div class="card">
            <h3>Promedio de ánimo</h3>
            <p class="value" id="promedio-animo">7.8/10</p>
            <p class="desc" id="desc-animo">15% de mejora respecto a la semana pasada</p>
        </div>

        <div class="card">
            <h3>Horas pico</h3>
            <p class="value" id="horas-pico">10 AM - 2 PM</p>
            <p class="desc" id="desc-horas">Emociones más positivas registradas</p>
        </div>

        <div class="card">
            <h3>Consistencia</h3>
            <p class="value" id="consistencia">85%</p>
            <p class="desc" id="desc-consistencia">Puntuación de estabilidad del estado de ánimo</p>
        </div>
    </div>

    <h2 class="section-title">Distribución emocional</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Emoción</th>
                    <th>Porcentaje</th>
                    <th>Tendencia</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody id="tabla-emociones">
                <tr>
                    <td>Alegría</td>
                    <td>32%</td>
                    <td class="positive">↑ 5%</td>
                    <td>Más frecuente por las mañanas</td>
                </tr>
                <tr>
                    <td>Calma</td>
                    <td>28%</td>
                    <td class="positive">↑ 3%</td>
                    <td>Consistente durante todo el día</td>
                </tr>
                <tr>
                    <td>Neutral</td>
                    <td>25%</td>
                    <td class="positive">↑ 2%</td>
                    <td>Común por las tardes</td>
                </tr>
                <tr>
                    <td>Estrés</td>
                    <td>15%</td>
                    <td class="negative">↓ 6%</td>
                    <td>Tendencia decreciente</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function cambiarTab(periodo) {
        // Eliminar la clase active de todos los botones
        document.querySelectorAll('.tab').forEach(button => {
            button.classList.remove('active');
        });

        // Agregar la clase active al botón que fue clickeado
        const botonSeleccionado = document.querySelector(`button[onclick="cambiarTab('${periodo}')"]`);
        botonSeleccionado.classList.add('active');

        // Aquí puedes añadir la lógica para cambiar los datos según el periodo seleccionado
        // Por ejemplo, si es 'semanal', 'mensual' o 'trimestral'
        let datos = {
            semanal: {
                promedio: "7.8/10",
                descAnimo: "15% de mejora respecto a la semana pasada",
                horasPico: "10 AM - 2 PM",
                descHoras: "Emociones más positivas registradas",
                consistencia: "85%",
                descConsistencia: "Puntuación de estabilidad del estado de ánimo",
                emociones: [
                    ["Alegría", "32%", "↑ 5%", "Más frecuente por las mañanas"],
                    ["Calma", "28%", "↑ 3%", "Consistente durante todo el día"],
                    ["Neutral", "25%", "↑ 2%", "Común por las tardes"],
                    ["Estrés", "15%", "↓ 6%", "Tendencia decreciente"]
                ]
            },
            mensual: {
                promedio: "7.5/10",
                descAnimo: "10% de mejora respecto al mes pasado",
                horasPico: "11 AM - 3 PM",
                descHoras: "Mayor estabilidad en la tarde",
                consistencia: "80%",
                descConsistencia: "Patrón de emociones estable",
                emociones: [
                    ["Alegría", "30%", "↑ 3%", "Más común en las tardes"],
                    ["Calma", "27%", "↑ 2%", "Presente en la mayoría del día"],
                    ["Neutral", "26%", "↑ 1%", "Tendencia estable"],
                    ["Estrés", "17%", "↓ 4%", "Menos frecuente en comparación al mes pasado"]
                ]
            },
            trimestral: {
                promedio: "7.2/10",
                descAnimo: "5% de mejora respecto al trimestre pasado",
                horasPico: "9 AM - 1 PM",
                descHoras: "Mayor estabilidad en las mañanas",
                consistencia: "75%",
                descConsistencia: "Fluctuaciones leves pero constantes",
                emociones: [
                    ["Alegría", "28%", "↑ 2%", "Presente en todo el trimestre"],
                    ["Calma", "25%", "↑ 1%", "Se mantiene estable"],
                    ["Neutral", "30%", "↓ 2%", "Ligera reducción en la tendencia"],
                    ["Estrés", "17%", "↓ 3%", "Reducción en comparación con periodos anteriores"]
                ]
            }
        };

        let seleccion = datos[periodo];
        document.getElementById("promedio-animo").innerText = seleccion.promedio;
        document.getElementById("desc-animo").innerText = seleccion.descAnimo;
        document.getElementById("horas-pico").innerText = seleccion.horasPico;
        document.getElementById("desc-horas").innerText = seleccion.descHoras;
        document.getElementById("consistencia").innerText = seleccion.consistencia;
        document.getElementById("desc-consistencia").innerText = seleccion.descConsistencia;

        let tbody = document.getElementById("tabla-emociones");
        tbody.innerHTML = "";
        seleccion.emociones.forEach(e => {
            let row = `<tr><td>${e[0]}</td><td>${e[1]}</td><td class="positive">${e[2]}</td><td>${e[3]}</td></tr>`;
            tbody.innerHTML += row;
        });
    }
</script>
@endsection
