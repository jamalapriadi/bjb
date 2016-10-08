$('.table').dataTable({
    lengthMenu: [
        [10, 25, 50, 75, -1],
        [10, 25, 50,75,  'Semua']
    ],
    language: {
        url: data_tables_id
    },
    destroy: true
});