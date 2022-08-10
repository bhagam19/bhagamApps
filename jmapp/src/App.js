import logo from './FliaRV.jpg';
import './App.css';
import Testimonio from './componentes/Testimonio';

function App() {
  return (
    <div className="App">

        <div className='contenedor-principal'>
          <h1 class='animate__pulse'> MIEMBROS DE LA FAMILIA RV:</h1>
          <Testimonio 
            nombre='Copito'
            cargo='Ser lo mas lindo de la casa'
            testimonio='Me gusta morderle los dedos de los pies a JuaMa 
            cuando está dormido, mi especialidades gritar a las 6am sin
             ningun motivo aparente y asustara toda la familia cuando me 
             escondo en el patio trasero, mi hobbie es comer wiskas de
             pollito y dormir 24/7.  ^w^'
            imagen='copito'/>
          <Testimonio 
            nombre='Adolfo'
            cargo='Papá / Rector de la I.E.E.'
            testimonio='"Carpe díem".
            Mi especialidad es hacer que mi hijo mayor aprenda react B) 
            para que se haga rico y me compre unas google glass, profesor 
            de Ingles, exelente chef (plato estrella: Caldo de carne). '
            imagen='adolfo'/>
            <Testimonio 
            nombre='Vanessa'
            cargo='Mamá / Ama de casa'
            testimonio='Mamita quierida de la casa, mi espeialidad es
            hacer que todos se vean bien en salidas, fiestas, eventos,
            comidas, etc, soy la que mantiene viva a la familia y hace
            que tomen la luz del sol de vez en cuando. Una maestra culinaria con un estilo
            unico para estilizar espacios y la mejor mamá del mundo mundial'
            imagen='vanessa'/>
            <Testimonio 
            nombre='Luciana'
            cargo= 'Tia / Gustos exoticos con la comidad'
            testimonio='Mi especialidad es estar ahí para burlarme de 
            JuanMa cuando se cae y luego ayudarlo a levantarse, estar ahí para 
            que me cuente su desgracia de que bajo a bronze por 215aba vez, soy la 
            que mantiene viva a copito dandole su comida y su wiskas. '
            imagen='luci'/>
            <Testimonio 
            nombre='Juan Manuel'
            cargo='Hijo mayor / Especialista en ser espantaviejas Bv'
            testimonio='"Un gran poder conlleva una gran responsabilidad...
            pero me da pereza, mejor mañana".
            Mi especialidad es hacer reir a todos en la casa, bajar de
            rango en valorant, tener un flow descomunal y hablar tanta
            bobada como se me ocurra.'
            imagen='jm'/>
            <Testimonio 
            nombre='Sara'
            cargo='Hermana del medio / La princesa hermosa'
            testimonio='"Carpe díem".
            Mi especialidad es leer cuentos y ganar premios por todas partes
            ser la que mas sale en fotos familiares y la que se viste aesthetic
            de la casa, mimar hasta al cansancio a copito y comprar nutela. '
            imagen='sara'/>
            <Testimonio 
            nombre='Jacobo'
            cargo='Hermano menor / bacojito'
            testimonio='Mi especialidad es junto a JM hacer reir a toda la familia,
            ser el mas fotogenico de toda la casa e ironicamente ser el que mas odia
            las fotos, me encanta comer mecaticossss y jugar minecraft con mis amigos. '
            imagen='cobo'/>

        </div>
    </div>
  );
}

export default App;
