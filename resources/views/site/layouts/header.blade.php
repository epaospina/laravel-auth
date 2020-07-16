<header class="bgimg-1 mcv-display-container mcv-grayscale-min" id="home">
    <div class="mcv-row-padding">
        <div class="mcv-col m5 mcv-title">
            <h1 itemprop="name">El mejor precio en el transporte de vehículos</h1>
        </div>
        <div class="mcv-col m7 presupuesto">
            <form method="post" action="{{route('presupuesto')}}">
                Calcule su presupuesto
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <input class="mcv-input mcv-border" placeholder="Tipo de vehiculo" required type="text" name="tipo_vehiculo" id="tipo_vehiculo">
                    </div>
                    <div class="item-presupuesto">
                        <input class="mcv-input mcv-border" placeholder="Modelo" required type="text" name="modelo" id="modelo">
                    </div>
                </div>
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <input class="mcv-input mcv-border" placeholder="Telefono" required type="text" name="telefono" id="telefono">
                    </div>
                    <div class="item-presupuesto">
                        <input class="mcv-input mcv-border" placeholder="Email" required type="text" name="email" id="email">
                    </div>
                </div>
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <input class="mcv-input mcv-border" placeholder="Desde" required type="text" name="desde" id="desde">
                    </div>
                </div>
                <div class="mcv-col m6">
                    <div class="item-presupuesto">
                        <input class="mcv-input mcv-border" placeholder="Hasta" required type="text" name="hasta" id="hasta">
                    </div>
                </div>
                He leído, entiendo y acepto  <br />la cláusula de protección de datos.<br />
                <button class="mcv-button mcv-black" type="submit">
                    <i class="fa fa-paper-plane"></i>Enviar Presupuesto
                </button>
            </form>
        </div>
    </div>
</header>
