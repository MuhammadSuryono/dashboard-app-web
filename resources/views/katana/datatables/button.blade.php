{
    extend: 'collection',
    text: 'Export',
    className: 'form-group btn btn-primary',
    buttons: [
    {
        extend: 'copy',
        text: '<i class="fa fa-fw fa-copy"></i> Copy',
        titleAttr: 'Copy to clipboard',
        exportOptions:
        {
            columns: 'th:not(.no-export)'
        }
    },
    {
        extend: 'excel',
        text: '<i class="fa fa-fw fa-file-excel"></i> Excel',
        titleAttr: 'Export to xlsx',
        filename: function()
        {
            var date = new Date();

            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            return title + ' - ' + year + month + day + minutes + seconds;
        },
        exportOptions:
        {
            columns: 'th:not(.no-export)'
        }
    },
    {
        extend: 'csv',
        text: '<i class="fa fa-fw fa-file-csv"></i> CSV',
        titleAttr: 'Export to csv',
        filename: function()
        {
            var date = new Date();

            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            return title + ' - ' + year + month + day + minutes + seconds;
        },
        exportOptions:
        {
            columns: 'th:not(.no-export)'
        }
    }
    ]
}
{{-- {
    extend: 'collection',
    text: 'Option',
    className: 'form-group btn btn-primary',
    buttons: [
    {
        text: '<i class="fa fa-fw fa-refresh"></i>&nbsp;Refresh Table',
        titleAttr: 'Refresh Table',
        attr:
        {
            id: 'refresh-table'
        },
        action: function ()
        {
            table.ajax.reload(null, false);
            $('#refresh-table').html('<i class="fa fa-fw fa-refresh fa-spin"></i>&nbsp;Refresh Table');
        }
    },
    {
        extend: 'colvis',
        text: 'Column Viibility&nbsp;',
        titleAttr: 'Set column visibility'
    }
    ]
}, --}}
