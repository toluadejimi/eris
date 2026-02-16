{{-- DataTables init for exam tables: sorting, search, pagination. Requires dataTable_assets or dataTable_scripts loaded first. --}}
<script>
jQuery(function($) {
    var $t = $('#exam-schedule-table');
    if ($t.length && !$.fn.DataTable.isDataTable($t[0])) {
        $t.DataTable({
            order: [[1, 'desc']],
            pageLength: 25,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
            language: { search: 'Search:', lengthMenu: 'Show _MENU_ entries' },
            columnDefs: [{ orderable: false, targets: -1 }]
        });
    }
});
</script>
