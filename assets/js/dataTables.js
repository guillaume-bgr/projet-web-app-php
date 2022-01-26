$(document).ready(function () {
    $.ajax({
        url: "../../controllers/TeamController.php?method=index",
        method: "GET",
        dataType: "json",
        success: function (data) {
            $("#teammates").dataTable({
                bLengthChange: false,
                data: data,
                "columnDefs": [
                    {"className": "dt-center", "targets": "_all"}
                ],
                columns: [
                    { 'data': 'first_name' },
                    { 'data': 'last_name' },
                    { 'data': 'email' },
                    { 'data': 'job' },
                    { 'data': 'salary' },
                    {
                        'render': function (data, type, row, meta) {
                            return row.start_hour + "h | " + row.end_hour + "h";
                        },
                        'orderable': false
                    },
                    {
                        'render': function (data, type, row, meta) {
                            return `<a class="button" href="/views/team.php?id=`+row.id+`"><i class="fas fa-eye"></i></a>`;
                        },
                        'orderable': false
                    }
                ],
                language: {
                    "lengthMenu": "_MENU_ Résultats par page",
                    "search": "Rechercher : ",
                    "paginate": {
                        "previous": "Page précédente",
                        "next": "Page suivante"
                    },
                    "info": "Entrées _START_ à _END_ sur _TOTAL_ résultats"
                }
            })
        }
    })
})