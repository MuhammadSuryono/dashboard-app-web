<script type="text/javascript">
// var scale = 'scale(1)';
// document.body.style.webkitTransform =  scale;    // Chrome, Opera, Safari
// document.body.style.msTransform =   scale;       // IE 9
// document.body.style.transform = scale;     // General
    const BASE_URL = "http://192.168.7.168:7000/api/v1";

    function getcategory() {
        var data = [];

        $.ajax({
            method: "GET",
            async: false,
            url: BASE_URL+"/categories",
        })
        .done(function (result){
            var res = result.data;
            console.log(res.length);
            res.forEach(element => {
                data.push(element);
            });
        })
        .fail(function (result) {
            console.log("FAILED");
            console.log(result);
        })
        
        return data;
    }

    $('input[name="reportdate"]').daterangepicker();

    <?php if(Session::has('notify.message') && Session::has('notify.status')) { ?>
        $.notify("{{ Session::get('notify.message') }}", "{{ Session::get('notify.status') }}");
    <?php } ?>
    var ladda = null;
    $(document).ajaxError(function(event, jqxhr, settings, exception) {
        if (exception == 'Unauthorized') {
            $.notify("Your session has expired. Redirecting...", "error");
            <?php if (env('APP_ENV') != 'prod' && env('APP_ENV') != 'production') { ?>
                console.log(event)
                console.log(jqxhr)
                console.log(settings)
                console.log(exception)
            <?php } else { ?>
                window.location = '{{ url()->full() }}';
            <?php } ?>
        }
    });
    $('select.select2').select2({
        allowClear: true,
        theme: 'bootstrap4',
        ajax: {
            method: "GET",
            data: {
                @yield('select2.payload')
            }
        }
    });
    $('select.select2-pure').select2({
        allowClear: true,
        theme: 'bootstrap4'
    });
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    var length = [10, 25, 50, 100, -1];
    var menu = [10, 25, 50, 100, "All"];
    <?php if (env('APP_ENV') != 'prod' && env('APP_ENV') != 'production') { ?>
        length.unshift(1);
        menu.unshift(1);
    <?php } else { ?>
        $.fn.dataTable.ext.errMode = 'none';
    <?php } ?>
    var title = $(document).attr('title').split(' | ');
    title.splice(-1, 1);
    title = title.join(' ');
    title = title.toLowerCase().replace(/\b[a-z]/g, function(txtVal) {
        return txtVal.toUpperCase();
    });
    var table = $('table:not(.pure-table)').DataTable({
        "lengthChange": true,
        "lengthMenu": [ length, menu ],
        "iDisplayLength": 25,
        'dom': "<'row justify-content-center justify-content-between'<'col-sm-12 col-xs-12 col-md-4'l><'col-sm-12 col-xs-12 col-md-4 mx-auto center text-center'B><'col-sm-12 col-xs-12 col-md-4'f>>"
        + "<'row'<'col-sm-12'tr>>"
        + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [ @yield('datatables.start-button') @include('katana.datatables.button') @yield('datatables.end-button')],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ url()->current() }}",
            "data": function ( d ) {
                console.log(d);
                return $.extend( {}, d, {
                    "type": true,
                    @yield('datatables.payload')
                } );
            },
            "dataSrc": function ( json ) {
                $('#refresh-table').html('<i class="fa fa-fw fa-refresh"></i>&nbsp;Refresh Table');
                return json.data;
            }
        },
        "columns": [ @yield('columns') ],
        "ordering": true,
        "rowCallback": function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(@yield('rowCallback', '1'))', row).html(index);
        },
        @yield('datatables-callback')
    });

    $(document).on('keydown', '.form-control', function() {
        $(this).removeClass('is-invalid');
    });
    $(document).on('keydown', '.numeric', function(event) {
        if (event.shiftKey == true) {
            event.preventDefault();
        }
        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) {
        } else {
            event.preventDefault();
        }
    });

    function formatMoney(number, decPlaces, decSep, thouSep) {
        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
            decSep = typeof decSep === "undefined" ? "." : decSep;
        thouSep = typeof thouSep === "undefined" ? "," : thouSep;
        var sign = number < 0 ? "-" : "";
        var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
        var j = (j = i.length) > 3 ? j % 3 : 0;

        return sign +
            (j ? i.substr(0, j) + thouSep : "") +
            i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
            (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
    }
</script>