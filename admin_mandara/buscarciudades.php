<?php
$html = "";
if ($_POST["paiselegido"]=="Facial") {
    $html = '
    <option value="Limpieza facial">Limpieza facial</option>
    <option value="Dermapén facial">Dermapén facial</option>
    <option value="Limpieza facial profunda">Limpieza facial profunda</option>
    <option value="Limpieza piel acneica">Limpieza piel acneica</option>
    <option value="Microderhabracion efecto glow">Microderhabracion efecto glow</option>

    <option value="Radiofrecuencia facial">Radiofrecuencia facial</option>
    <option value="Mesoterapia facial">Mesoterapia facial</option>
    <option value="Radiofrecuencia + Mesoterapia efecto lifting">Radiofrecuencia + Mesoterapia efecto lifting</option>
    <option value="Tratamiento papada cuello y escote">Tratamiento papada cuello y escote</option>

    <option value="Yellow peell">Yellow peell</option>
    <option value="Dna peell">Dna peell</option>
    <option value="Orange pelll">Orange pelll</option>
    <option value="Tratamiento contorno de ojos">Tratamiento contorno de ojos</option>

    <option value="Lifting (ondulado) de pestañas">Lifting (ondulado) de pestañas</option>
    <option value="Micropigmentacion de labios">Micropigmentacion de labios</option>
    <option value="Micropigmentacion de ojos 4 líneas">Micropigmentacion de ojos 4 líneas</option>
    <option value="Micropigmentacion de ojos 2 líneas">Micropigmentacion de ojos 2 líneas</option>

    <option value="Microblanding de cejas">Microblanding de cejas</option>
    <option value="Híbrido de cejas">Híbrido de cejas</option>
    <option value="Retoque de ojos">Retoque de ojos</option>
    <option value="Retoque de labios">Retoque de labios</option>
    ';  
}
if ($_POST["paiselegido"]=="Corporal") {
    $html = '
    <option value="Dep. Cera - Cuerpo Total">Dep. Cera - Cuerpo Total </option>
    <option value="Dep. Cera - Área bikini">Dep. Cera - Área bikini </option>
    <option value="Dep. Cera - Pierna completa">Dep. Cera - Pierna completa </option>
    <option value="Dep. Cera - Media pierna">Dep. Cera - Media pierna</option>
    <option value="Dep. Cera - Abdomen">Dep. Cera - Abdomen</option>

    <option value="Dep. Cera - Glúteos">Dep. Cera - Glúteos </option>
    <option value="Dep. Cera - Colá">Dep. Cera - Colá</option>
    <option value="Dep. Cera - Espalda">Dep. Cera - Espalda</option>
    <option value="Dep. Cera - Brazos">Dep. Cera - Brazos</option>

    <option value="Dep. Cera - Pecho">Dep. Cera - Pecho </option>
    <option value="Dep. Cera - Facial">Dep. Cera - Facial</option>
    <option value="Dep. Cera - Cejas">Dep. Cera - Cejas</option>
    <option value="Dep. Cera - Bigote">Dep. Cera - Bigote</option>
    <option value="Dep. Cera - Pecho _abdomen">Dep. Cera - Pecho _abdomen</option>


    <option value="Dep. Def. - Área bikini">Dep. Def. - Área bikini </option>
    <option value="Dep. Def. - Pierna completa">Dep. Def. - Pierna completa </option>
    <option value="Dep. Def. - Media pierna">Dep. Def. - Media pierna </option>
    <option value="Dep. Def. - Abdomen">Dep. Def. - Abdomen </option>
    <option value="Dep. Def. - Glúteos">Dep. Def. - Glúteos </option>
    <option value="Dep. Def. - Colá">Dep. Def. - Colá </option>
    <option value="Dep. Def. - Espalda">Dep. Def. - Espalda </option>
    <option value="Dep. Def. - Brazos">Dep. Def. - Brazos </option>
    <option value="Dep. Def. - Pecho">Dep. Def. - Pecho </option>
    <option value="Dep. Def. - Facial">Dep. Def. - Facial </option>
    <option value="Dep. Def. - Cejas">Dep. Def. - Cejas </option>
    <option value="Dep. Def. - Bigote">Dep. Def. - Bigote </option>
    <option value="Dep. Def. - Pecho _abdomen">Dep. Def. - Pecho _abdomen </option>


    <option value="Masaje Relajante">Masaje Relajante </option>
    <option value="Masaje drenaje linfático">Masaje drenaje linfático</option>
    <option value="Masaje post_operatorio">Masaje post_operatorio</option>
    <option value="Paquete masaje básico">Paquete masaje básico</option>

    <option value="Paquete masaje reductivo básico">Paquete masaje reductivo básico</option>
    <option value="Paquete de masaje reductivo localizado con aparatología y madero-terapia">Paquete de masaje reductivo localizado con aparatología y madero-terapia</option>
    <option value="Masaje con maderitas">Masaje con maderitas</option>
    <option value="Exfoliación corporal">Exfoliación corporal</option>

    <option value="Envolvimento corporal">Envolvimento corporal</option>
    <option value="Exfoliación Envolvimento y masaje">Exfoliación Envolvimento y masaje</option>
    <option value="Mesoterapia">Mesoterapia</option>
    <option value="Carboxuterapia">Carboxuterapia</option>

    <option value="Tratamiento corporal con combinado">Tratamiento corporal con combinado</option>
    <option value="Piedras calientes">Piedras calientes</option>
 







    ';  
}
echo $html; 
?>