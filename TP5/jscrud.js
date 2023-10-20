
        function formatDate(dateString) {
            let dateParts = dateString.split("-");
            let day = dateParts[2];
            let month = dateParts[1];
            let year = dateParts[0];

            return `${day}/${month}/${year}`;
        }

        $(document).ready(function() {
            $("#addStudentForm").submit(function(event) {
                // prevent the form to be sent to the server
                event.preventDefault();
                let nom = $("#inputNom").val();
                let prenom = $("#inputPrenom").val();
                let anniv = formatDate($("#inputBirthday").val());
                let avis = $("#inputAvis").is(":checked") ? "oui" : "non";
                let rq = $("#inputRq").val();
                let newRow = `
                <tr>
                    <td>${nom}</td>
                    <td>${prenom}</td>
                    <td>${anniv}</td>
                    <td>${avis}</td>
                    <td>${rq}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
                    </td>
                </tr>`;
            $("#studentsTableBody").append(newRow);

            }); 
        });
        
        function modifyRow(button) {
            // Sélectionner la ligne parente
            let row = $(button).closest('tr');

            // Récupérer les valeurs actuelles des cellules
            let nom = row.find('td:eq(0)').text();
            let prenom = row.find('td:eq(1)').text();
            let anniv = row.find('td:eq(2)').text();
            let avis = row.find('td:eq(3)').text();
            let rq = row.find('td:eq(4)').text();

            // Remplacer le contenu des cellules par des champs de saisie pré-remplis
            row.find('td:eq(0)').html(`<input type="text" value="${nom}" />`);
            row.find('td:eq(1)').html(`<input type="text" value="${prenom}" />`);
            row.find('td:eq(2)').html(`<input type="date" value="${anniv}" />`);
            row.find('td:eq(3)').html(`<input type="checkbox" ${avis === 'oui' ? 'checked' : ''} />`);
            row.find('td:eq(4)').html(`<input type="text" value="${rq}" />`);

            // Ajouter un bouton "Save"
            row.find('td:eq(5)').html(`<button type="button" class="btn btn-success" onclick="saveRow(this)">Save</button>`);
        }

        function saveRow(button) {
            // Sélectionner la ligne parente
            let row = $(button).closest('tr');

            // Récupérer les nouvelles valeurs des champs de saisie
            let nom = row.find('input:eq(0)').val();
            let prenom = row.find('input:eq(1)').val();
            let anniv = row.find('input:eq(2)').val();
            let avis = row.find('input:eq(3)').is(":checked") ? "oui" : "non";
            let rq = row.find('input:eq(4)').val();

            // Mettre à jour les cellules avec les nouvelles valeurs
            row.find('td:eq(0)').text(nom);
            row.find('td:eq(1)').text(prenom);
            row.find('td:eq(2)').text(anniv);
            row.find('td:eq(3)').text(avis);
            row.find('td:eq(4)').text(rq);

            // Ajouter de nouveau le bouton "Modify" et le bouton "Delete"
            row.find('td:eq(5)').html(`<button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`);
        }

        function deleteRow(button){
            $(button).closest('tr').remove();
        }
