var tableCargos;

document.addEventListener('DOMContentLoaded', function () {
    tableCargos = $('#tabelaCargo').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        },
        "ajax": {
            "url": " " + base_url + "/Cargo/getCargos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "nome" },
            { "data": "descricao" },
            { "data": "status" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    });
});

$('#tabelaCargo').DataTable();

function openModal() {
    $("#modalFormCargo").modal("show");
    $("#txtNome").select();
}