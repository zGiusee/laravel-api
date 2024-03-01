import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// Recupero tutti i pulsanti della tabella
const deleteButtons = document.querySelectorAll('.my_delete_button');

// Ciclo tutti i pulsanti

deleteButtons.forEach((button) => {
    button.addEventListener('click', function () {
        // Recupero lo slug dai data
        let slug = button.getAttribute('data-slug');

        // Recupero il nome del progetto
        let name = button.getAttribute('data-name');

        // Recupero il tipo di dato
        let type = button.getAttribute('data-type');

        // Recupero lo spazio riservato al nome del progetto dentro il modal
        const modal_project_name = document.getElementById('project_name');

        // Applico il contenuto al modal
        modal_project_name.textContent = name;

        // Definisco la url
        let url = `${window.location.origin}/admin/${type}/${slug}`;

        // Recupero la formìì
        let delete_form = document.getElementById('delete_form');

        // applico alla form l'url
        delete_form.setAttribute('action', url);
    })
})
