import React from "react";
import '../stlyesheets/Testimonio.css'
function Testimonio(props) {
    return (
        <div className='contenedor-testimonio'>
            <img
                className='imagen-testimonio'
                src={require(`../imagenes/testimonio-${props.imagen}.png`)}
                alt='Foto Copito'/> 
            <div className='contenedor-texto-testimonio'>
                <p className='nombre-testimonio'>
                Nombre: <strong>{props.nombre}</strong>
                </p>
                    
                <p className='cargo-testimonio'> Cargo / Especialidad:
                    <strong> {props.cargo}</strong>
                </p>
                <p className='texto-testimonio'>{props.testimonio}</p>
            </div>
        </div>
    );
}

export default Testimonio;
