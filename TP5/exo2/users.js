$(document).ready(function() {
    let table = $('#users').DataTable({
        ajax: {
            url: 'http://localhost:8888/IDAW/TP4/exo5/users.php',
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'id' }, 
            { data: 'name' }, 
            { data: 'email' }, 
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
                    `;
                }
            }
        ]
    });

    $('#submitBtn').click(function() {
        let name = $('#inputNom').val();
        let email = $('#inputMail').val();

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8888/IDAW/TP4/exo5/users.php',
            data: {name: name, email: email},
            success: function(response) {
                let newUser = `
                    <td>${response.id}</td>
                    <td>${response.name}</td>
                    <td>${response.email}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
                    </td>
                `;

                table.row.add($(newUser)).draw();

                $('#inputNom').val('');
                $('#inputMail').val('');
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});


function modifyRow(button) {
    // Sélectionner la ligne parente
    let row = $(button).closest('tr');

    // Récupérer les valeurs actuelles des cellules
    let nom = row.find('td:eq(1)').text();
    let mail = row.find('td:eq(2)').text();

    // Remplacer le contenu des cellules par des champs de saisie pré-remplis
    row.find('td:eq(1)').html(`<input type="text" value="${nom}" />`);
    row.find('td:eq(2)').html(`<input type="text" value="${mail}" />`);

    // Ajouter un bouton "Save"
    row.find('td:eq(3)').html(`<button type="button" class="btn btn-success" onclick="saveRow(this)">Save</button>`);
}

function saveRow(button) {
    // Sélectionner la ligne parente
    let row = $(button).closest('tr');

    // Récupérer les nouvelles valeurs des champs de saisie``
    let id = row.find('td:eq(0)').text();
    let name = row.find('input:eq(0)').val();
    let email = row.find('input:eq(1)').val();

    row.find('td:eq(1)').text(name);
    row.find('td:eq(2)').text(email);
    row.find('td:eq(3)').html(`<button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`);
        


    // Faire une requête pour mettre à jour les informations dans le backend
    $.ajax({
        type: 'PUT',
        url: 'http://localhost:8888/IDAW/TP4/exo5/users.php',
        contentType: 'application/x-www-form-urlencoded',
        data: {id: id, name: name, email: email},
        success: function(response) {
            row.find('td:eq(1)').text(name);
            row.find('td:eq(2)').text(email);
            row.find('td:eq(3)').html(`<button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function deleteRow(button) {
    let row = $(button).closest('tr');

    // Récupérer les valeurs actuelles des cellules
    let id = row.find('td:eq(0)').text();
    $(`#users tbody tr[data-id="${id}"]`).remove();

    $.ajax({
        type: 'DELETE',
        url: 'http://localhost:8888/IDAW/TP4/exo5/users.php',
        data: {id: id},
        success: function(response) {
            let table = $('#users').DataTable();
            table.row(row).remove().draw();

        },
        error: function(error) {
            console.error(error);
        }
    });
    }