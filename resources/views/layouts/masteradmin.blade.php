<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Extra CSS -->
    @yield('ExtraCSS')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.sidebaradmin')

    <!-- Content Wrapper. Contains page content -->
    @yield('web-content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>

<!-- Extra JavaScript -->
@yield('ExtraJS')

<script>
        $(function() {
  let copyButtonTrans = 'copy'
  let csvButtonTrans = 'csv'
  let excelButtonTrans = 'excel'
  let pdfButtonTrans = 'pdf'
  let printButtonTrans = 'print'
  let colvisButtonTrans = 'Column visibility'
  let languages = {
    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
  };
  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages['{{ app()->getLocale() }}']
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'copy',
        className: 'btn-outline-secondary mx-2',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-outline-secondary mx-2',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-outline-secondary mx-2',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-outline-secondary mx-2',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-outline-secondary mx-2',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
    ]
  });
  $.fn.dataTable.ext.classes.sPageButton = '';
});
    </script>
    @stack('script-alt')
    <!-- Page level custom scripts -->
    <!-- <script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/js/demo/chart-pie-demo.js') }}"></script> -->
</body>
</html>
