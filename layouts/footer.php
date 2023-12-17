<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2023 <a href="https://si.umk.ac.id" target="_blank">CV BADAK TRUSS</a>.</strong> All rights
    reserved.
</footer>
</div>
</body>
<script>
    $(function() {
        $('#tabel').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
        $('#tabel2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
    })
    $('#datepicker_stok').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
    })

    function dp_edit(id_pengiriman) {
        $('#tgl' + id_pengiriman).datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
            language: "id",
            locale: "id",
        });
    }
</script>

</html>