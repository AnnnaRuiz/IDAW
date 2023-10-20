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
                        <button type="button" class="btn btn-primary" onclick="modifyRow(${row.id})">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(${row.id})">Delete</button>
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
                        <button type="button" class="btn btn-primary" onclick="modifyRow(${response.id})">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(${response.id})">Delete</button>
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

function modifyRow(id) {
    let row = $(`#users tbody tr[data-id="${id}"]`);
    let name = row.find('td:eq(1)').text();
    let email = row.find('td:eq(2)').text();

    row.find('td:eq(1)').html(`<input type="text" value="${name}" />`);
    row.find('td:eq(2)').html(`<input type="text" value="${email}" />`);
    row.find('td:eq(3)').html(`<button type="button" class="btn btn-success" onclick="saveRow(${id})">Save</button>`);
}

function saveRow(id) {
    let row = $(`#users tbody tr[data-id="${id}"]`);
    let name = row.find('input:eq(0)').val();
    let email = row.find('input:eq(1)').val();

    // Faire une requête pour mettre à jour les informations dans le backend
    $.ajax({
        type: 'PUT',
        url: 'http://localhost:8888/IDAW/TP4/exo5/users.php',
        data: {id: id, name: name, email: email},
        success: function(response) {
            row.find('td:eq(1)').text(name);
            row.find('td:eq(2)').text(email);
            row.find('td:eq(3)').html(`<button type="button" class="btn btn-primary" onclick="modifyRow(${id})">Modify</button><button type="button" class="btn btn-danger" onclick="deleteRow(${id})">Delete</button>`);
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function deleteRow(id) {
    let userId = id;
    // Faire une requête pour supprimer l'utilisateur dans le backend
    $.ajax({
        type: 'DELETE',
        url: 'http://localhost:8888/IDAW/TP4/exo5/users.php',
        data: {id: id},
        success: function(response) {
            $(`#users tbody tr[data-id="${userId}"]`).remove();

        },
        error: function(error) {
            console.error(error);
        }
    });
}
