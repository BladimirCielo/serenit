@extends('sidebar')

@section('title', 'Calendario')

@section('estilos_adicionales')
    <link href="{{ asset('css/calendario.css') }}" rel="stylesheet">
@endsection

@section('contenido')

    <div class="calendar-container">
        <header>
            <h2>Calendario</h2>
            <div class="controls">
                <button class="btn">Anterior</button>
                <button class="btn active">Hoy</button>
                <button class="btn">Siguiente</button>
            </div>
        </header>
        <div class="calendar-header">
            <h3>Octubre 2023</h3>
            <div class="view-toggle">
                <button class="btn active">Mes</button>
                <button class="btn">Semana</button>
                <button class="btn">Día</button>
            </div>
        </div>
        <table class="calendar">
            <thead>
                <tr>
                    <th>Domingo</th><th>Lunes</th><th>Martes</th><th>Miércoles</th>
                    <th>Jueves</th><th>Viernes</th><th>Sábado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td>
                </tr>
                <tr>
                    <td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td>
                </tr>
                <tr>
                    <td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td>
                </tr>
                <tr>
                    <td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td>
                </tr>
                <tr>
                    <td>29</td><td>30</td><td>31</td><td></td><td></td><td></td><td></td>
                </tr>
            </tbody>
        </table>
        <div class="upcoming-tasks">
            <h3>Próximas tareas</h3>
            <div class="task-list">
                <div class="task">
                    <h4>Sesión de Terapia</h4>
                    <p>Oct 4, 10:00 AM - 11:00 AM</p>
                    <button class="btn">Unirse</button>
                    <button class="btn">Reprogramar</button>
                </div>
                <div class="task">
                    <h4>Meditación</h4>
                    <p>Oct 10, 8:00 AM - 8:30 AM</p>
                    <button class="btn">Empezar</button>
                    <button class="btn">Saltar</button>
                </div>
                <div class="task">
                    <h4>Diario de estado de ánimo</h4>
                    <p>Oct 10, 9:00 PM</p>
                    <button class="btn">Abrir</button>
                    <button class="btn">Recordar después</button>
                </div>
                <div class="task">
                    <h4>Agregar nueva tarea</h4>
                    <p>Programe una nueva actividad de salud mental</p>
                    <button class="btn">Crear</button>
                </div>
            </div>
        </div>
    </div>

@stop
