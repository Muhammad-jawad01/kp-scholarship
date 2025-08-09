$(function () {

    var dtUserTable = $('.slide-list-table');
    dtUserTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: 'slides/index',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            // { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

});