<div class="selectorTipoReporte">
    Seleccione el reporte deseado:
    <select name="reportes" id="reportes" onchange="cargarReporte(this.value)">
        <option value=0>Seleccione...</option>
        <option value=1>Análisis de Preguntas</option>
        <option value=2>Análisis de Áreas</option>
        <option value=3>Desempeños Individuales</option>
    </select>
</div>
<div id="reporte"></div>