@extends('sidebar')

@section('title', 'Organizador')

@section('estilos_adicionales')
    <link href="{{ asset('css/estadoanimo.css') }}" rel="stylesheet">
@endsection

@section('contenido')

    <div class="info">
        <h1>Organización del tiempo</h1>
        
    </div>

    
    <div class="flex space-x-4 mb-6">
            <button class="px-4 py-2 bg-gray-200 rounded">Vista General</button>
            <button class="px-4 py-2 bg-gray-200 rounded">Lista de Tareas</button>
            <a href="{{ route('calendar') }}" class="px-4 py-2 bg-gray-200 rounded">Calendario</a>

        </div>



    <table border=6>
    <main class="flex items-center justify-center h-screen">
        <tr class="bg-gray-200 text-center border border-gray-800">
            <td width=400 class="border border-gray-800 px-6 py-4">
                <h2 class="text-lg font-bold mb-2">Agregar evento</h2>
                <p class="text-gray-600">Programar sesiones de terapia, tiempo de meditación o bienestar.</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Agregar</button>
            </td>
            <td width=400 class="border border-gray-800 px-6 py-4">
                <h2 class="text-lg font-bold mb-2">Recordatorios</h2>
                <p class="text-gray-600">Establecer notificaciones personalizadas.</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Establecer</button>
            </td>
            <td width=400 class="border border-gray-800 px-6 py-4">
                <h2 class="text-lg font-bold mb-2">Tarea rápida</h2>
                <p class="text-gray-600">Agregar una nueva tarea con nivel de prioridad.</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Añadir</button>
            </td>
        </tr>
    </table>


    <div class="mt-20">
            <h2 class="text-xl font-semibold mb-4">Tareas Próximas</h2>
            <div class="space-y-4">
              
                <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg">
                    <span>Sesión de Terapia</span>
                    <div>
                        <button class="px-3 py-1 bg-yellow-500 text-white rounded">Editar</button>
                        <button class="px-3 py-1 bg-red-500 text-white rounded">Eliminar</button>
                    </div>
                </div>
                
               
                <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg">
                    <span>Ejercicio de Meditación</span>
                    <div>
                        <button class="px-3 py-1 bg-yellow-500 text-white rounded">Editar</button>
                        <button class="px-3 py-1 bg-red-500 text-white rounded">Eliminar</button>
                    </div>
                </div>
                
              
                <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg">
                    <span>Añadir al Diario de Ánimo</span>
                    <div>
                        <button class="px-3 py-1 bg-yellow-500 text-white rounded">Editar</button>
                        <button class="px-3 py-1 bg-red-500 text-white rounded">Eliminar</button>
                    </div>
                </div>
            </div>
    </div>



    <!-- Notificaciones -->
    <div class="bg-gray-100 shadow-md p-4 mt-20">
    <h2 class="text-lg font-bold mb-4">Ajuste de notificaciones</h2>
    <ul>
        <li class="text-gray-600 flex justify-between items-center">
            Notificaciones Plus 
        </li>
        <li class="text-gray-600 flex justify-between items-center mt-2">
            Recordatorios por email 
        </li>
    </ul>
</div>

  


</main>


@stop
