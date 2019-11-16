
<script>
    $(function () {
        $("#exampletable").slimtable({
            colSettings: [
                {colNumber: 5, enableSort: false, addClasses: ['customclass']},
                {colNumber: 4, enableSort: false, addClasses: ['customclass']}
            ]
        });
    });
    function adDetails(id) {
        var postData = {};
        postData.value1 = id;
        $.ajax({
            url: "<?PHP echo base_url('ad/adDetails'); ?>",
            type: 'post',
            dataType: 'html',
            data: postData
        }).done(function (data) {
            $('#myModal').show();
            $('#myModal').find('.modal-body').html(data);
            return false;
        });
    }
</script>