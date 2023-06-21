const selectGenero = document.querySelector("#genero");

function abrirSubgenero(){
    const genero = selectGenero.value;
    const divSubgenero = document.querySelector(".subgenero");
    // Crear el select como elemento
    divSubgenero.innerHTML = null;
    const select = document.createElement("select");
    select.name = "subgenero";

    if (genero == "ficcion") {
        const option1 = document.createElement("option");
        option1.value = "romantica";
        option1.innerHTML = "Romántica";
        const option2 = document.createElement("option");
        option2.value = "ciencia-ficcion";
        option2.innerHTML = "Ciencia-ficción";
        const option3 = document.createElement("option");
        option3.value = "fantasia";
        option3.innerHTML = "Fantasía"
        const option4 = document.createElement("option");
        option4.value = "aventura";
        option4.innerHTML = "Aventura";
        const option5 = document.createElement("option");
        option5.value = "terror";
        option5.innerHTML = "Terror";
        const option6 = document.createElement("option");
        option6.value = "policial";
        option6.innerHTML = "Policial";
        select.append(option1);
        select.append(option2);
        select.append(option3);
        select.append(option4);
        select.append(option5);
        select.append(option6);
        divSubgenero.append(select); 
    } else if (genero == "no_ficcion") {
        const option1 = document.createElement("option");
        option1.value = "biografia";
        option1.innerHTML = "Biografía";
        const option2 = document.createElement("option");
        option2.value = "ensayo";
        option2.innerHTML = "Ensayo";
        const option3 = document.createElement("option");
        option3.value = "historica";
        option3.innerHTML = "Histórica";
        select.append(option1);
        select.append(option2);
        select.append(option3);
        divSubgenero.append(select); 
    } else if (genero == "novela_grafica") {
        const option1 = document.createElement("option"); 
        option1.value = "superheroes";
        option1.innerHTML = "Superhéroes";
        const option2 = document.createElement("option");
        option2.value = "ciencia-ficcion";
        option2.innerHTML = "Ciencia-ficción";
        const option3 = document.createElement("option");
        option3.value = "humor";
        option3.innerHTML = "Humor";
        const option4 = document.createElement("option");
        option4.value = "aventura";
        option4.innerHTML = "Aventura";
        const option5 = document.createElement("option");
        option5.value = "romantica";
        option5.innerHTML = "Romántica";
        const option6 = document.createElement("option");
        option6.value = "manga";
        option6.innerHTML = "Manga";
        select.append(option1);
        select.append(option2);
        select.append(option3);
        select.append(option4);
        select.append(option5);
        select.append(option6);
        divSubgenero.append(select); 

    } else if (genero == "teatro") {
        const option1 = document.createElement("option");
        option1.value = "teatro";
        option1.innerHTML = "Teatro";
        select.append(option1);
        divSubgenero.append(select); 

    } else {
        const option1 = document.createElement("option");
        option1.value="poesia";
        option1.innerHTML = "Poesía";
        select.append(option1);
        divSubgenero.append(select); 
    }
    // Añadir el select con todos los hijos (options) dentro del div vacío
}


