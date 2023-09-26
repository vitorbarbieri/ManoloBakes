var tableCargos;

document.addEventListener('DOMContentLoaded', function () {
    tableCargos = $('#tabelaCargo').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "scrollY": true,
        "scrollX": false, // Desativar scrool horizontal
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        },
        "ajax": {
            "url": " " + base_url + "/Cargo/getCargos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id", "width": "0%" },
            { "data": "nome", "width": "15%" },
            { "data": "descricao", "width": "60%" },
            { "data": "status", "width": "10%" },
            { "data": "opcao", "width": "15%" }
        ],
        "columnDefs": [
            { "visible": false, "targets": 0 } // Desativar coluna de índice 0 (id)
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[1, "asc"]]
    });
});

$('#tabelaCargo').DataTable();

function openModal() {
    $("#modalFormCargo").modal("show");
    $("#txtNome").select();
}