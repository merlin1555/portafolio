<section id="vuelos">
    <ul class="botones">
        <li><button href="#"><i class="fa-solid fa-plane"></i> Vuelos</button></li>
        <li><button href="#"><i class="fa-solid fa-plane"></i> <i class="fa-solid fa-h"></i> Vuelos + Hotel</button></li>
        <li><button href="#"><i class="fa-solid fa-h"></i> Hoteles</button></li>
        <li><button><a href="index.php#destinos"><i class="fa-solid fa-briefcase"></i> Paquetes</a></button></li>
        <li><button href="#"><i class="fa-solid fa-h"></i> Booking</button></li>
        <li><button><a href="asistencia_viaje.php"><i class="fa-solid fa-briefcase"></i> Asistencia en viaje</a></button></li>
    </ul>

    <div class="formulario">
        <ul class="orgigen">
            <li>
                <div>
                    <p>Origen</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </li>
            <li>
                <div>
                <p>Destino</p>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                </div>
            </li>
        </ul>
        <ul class="checks">
            <li class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="soloIda">
                <label class="form-check-label" for="soloIda">
                    Solo ida
                </label>
            </li>
            <li class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="idaVuelta">
                <label class="form-check-label" for="idaVuelta">
                    Ida y vuelta
                </label>
            </li>
            <li class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="vuelosDirectos">
                <label class="form-check-label" for="vuelosDirectos">
                    Vuelos directos
                </label>
            </li>
            <li class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="vuelosEquipajes">
                <label class="form-check-label" for="vuelosEquipajes">
                    Solo vuelos con equipajes
                </label>
            </li>
        </ul>
        <ul class="fechas">
            <li>
                <div>
                    <p>Ida</p>
                    <input type="date" value="2017-06-01" />
                </div>
            </li>
            <li>
                <div>
                    <p>vuelta</p>
                    <input type="date" value="2017-06-01" />
                </div>
            </li>
            <li>
                <div>
                    <p>Pasajeros</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </li>
        </ul>
        <div class="mas_opciones">
            <ul class="mas">
                <li>
                    <button>+ Más Opciones</button>
                </li>
                <li>
                    <button>Agregar otro destino</button>
                </li>
            </ul>
            <div class="buscar">
                <button>Busca tu vuelo</button>
            </div>
        </div>
    </div>
</section>