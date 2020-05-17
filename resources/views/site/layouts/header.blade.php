<header class="bgimg-1 mcv-display-container mcv-grayscale-min" id="home">
    <div class="mcv-row-padding">
        <div class="mcv-col m5 mcv-title">
            <h1 itemprop="name">El mejor precio en el transporte de vehículos</h1>
        </div>
        <div class="mcv-col m7 presupuesto">
            <form method="post" action="{{route('presupuesto')}}">
                <p class="text-center">Calcule su presupuesto</p>
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <label for="tipo_vehiculo">Tipo de vehiculo:</label>
                        <input class="mcv-input mcv-border" placeholder="Tipo de vehiculo" required type="text" name="tipo_vehiculo" id="tipo_vehiculo">
                    </div>
                    <div class="item-presupuesto">
                        <label for="modelo">Modelo:</label>
                        <input class="mcv-input mcv-border" placeholder="Modelo" required type="text" name="modelo" id="modelo">
                    </div>
                </div>
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <label for="telefono">Telefono:</label>
                        <input class="mcv-input mcv-border" placeholder="Telefono" required type="text" name="telefono" id="telefono">
                    </div>
                    <div class="item-presupuesto">
                        <label for="email">Email:</label>
                        <input class="mcv-input mcv-border" placeholder="Email" required type="text" name="email" id="email">
                    </div>
                </div>
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <label for="desde">Desde:</label>
                        <input class="mcv-input mcv-border" placeholder="Desde" required type="text" name="desde" id="desde">
                    </div>
                </div>
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <label for="hasta">Hasta:</label>
                        <input class="mcv-input mcv-border" placeholder="Hasta" required type="text" name="hasta" id="hasta">
                    </div>
                </div>
                <p style="padding: 0 20%;">
                    He leído, entiendo y acepto la cláusula de protección de datos.
                </p>
                <p class="text-center">
                    <button class="mcv-button mcv-black" type="submit">
                        <i class="fa fa-paper-plane"></i>Enviar Presupuesto
                    </button>
                </p>
            </form>
        </div>
    </div>
</header>
