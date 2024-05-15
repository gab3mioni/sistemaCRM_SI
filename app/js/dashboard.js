document.addEventListener('DOMContentLoaded', function () {
    const addLeadBtn = document.getElementById('addLeadBtn');
    const columns = document.querySelectorAll('.lead');

    addLeadBtn.addEventListener('click', function () {
        $('#novoRegistroModal').modal('show');
    });

    document.getElementById('novoRegistroForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const nomeLead = document.getElementById('nomeLead').value;
        const interesse = document.getElementById('interesse').value;
        const valor = document.getElementById('valor').value;

        const newLeadCard = document.createElement('div');
        newLeadCard.className = 'lead-card card m-2';
        newLeadCard.innerHTML = `
          <div class='border-top border-3 border-secondary fw-bold'>
              <h5><strong>${nomeLead}</strong></h5>
              <button class="btn btn-sm btn-outline-secondary float-end edit-btn">Editar</button>
          </div>
          <div class='h6'><p><strong>Sobre:</strong> ${interesse}</p></div>
          <div class='fs-6 text-light bg-secondary rounded text-center'><p><strong>Valor:</strong> ${valor}</p></div>
        `;
        columns[0].appendChild(newLeadCard);

        addDraggableEvents(newLeadCard);
        $('#novoRegistroModal').modal('hide');
    });

    function addDraggableEvents(element) {
        element.setAttribute('draggable', true);

        element.addEventListener('dragstart', (e) => {
            e.target.classList.add('dragging');
        });

        element.addEventListener('dragend', (e) => {
            e.target.classList.remove('dragging');
        });

        document.querySelectorAll('.edit-btn').forEach((btn) => {
btn.addEventListener('click', (e) => {
const card = e.target.closest('.lead-card');
const nomeLead = card.querySelector('h5').innerText;
const interesse = card.querySelector('p').innerText.split(':')[1].trim();
const valor = card.querySelector('.bg-secondary p').innerText.split(':')[1].trim();

document.getElementById('editNomeLead').value = nomeLead;
document.getElementById('editInteresse').value = interesse;
document.getElementById('editValor').value = valor;

card.classList.add('editing'); // Marcar o card como sendo editado
$('#editarRegistroModal').modal('show');
});
});

document.getElementById('editarRegistroForm').addEventListener('submit', function (e) {
e.preventDefault();
const nomeLead = document.getElementById('editNomeLead').value;
const interesse = document.getElementById('editInteresse').value;
const valor = document.getElementById('editValor').value;

const editedCard = document.querySelector('.lead-card.editing');
editedCard.querySelector('h5').innerText = nomeLead;
editedCard.querySelector('p').innerText = `Sobre: ${interesse}`;
editedCard.querySelector('.bg-secondary p').innerText = `Valor: ${valor}`;

editedCard.classList.remove('editing'); // Remover a marcação de edição do card
$('#editarRegistroModal').modal('hide');
});

    }

    columns.forEach((column) => {
        column.addEventListener('dragover', (e) => {
            e.preventDefault();
            const afterElement = getDragAfterElement(column, e.clientY);
            const draggingElement = document.querySelector('.dragging');
            if (afterElement == null) {
                column.appendChild(draggingElement);
            } else {
                column.insertBefore(draggingElement, afterElement);
            }
        });

        function getDragAfterElement(container, y) {
            const draggableElements = [...container.querySelectorAll('.lead-card:not(.dragging)')];
            return draggableElements.reduce((closest, child) => {
                const box = child.getBoundingClientRect();
                const offset = y - box.top - box.height / 2;
                if (offset < 0 && offset > closest.offset) {
                    return { offset: offset, element: child };
                } else {
                    return closest;
                }
            }, { offset: Number.NEGATIVE_INFINITY }).element;
        }
    });

    document.getElementById('editarRegistroForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const nomeLead = document.getElementById('editNomeLead').value;
        const interesse = document.getElementById('editInteresse').value;
        const valor = document.getElementById('editValor').value;

        const editedCard = document.querySelector('.lead-card.editing');
        editedCard.querySelector('h5').innerText = nomeLead;
        editedCard.querySelector('p').innerText = `<strong>Sobre:</strong> ${interesse}`;
        editedCard.querySelector('.bg-secondary p').innerText = `<strong>Valor:</strong> ${valor}`;

        $('#editarRegistroModal').modal('hide');
    });
});