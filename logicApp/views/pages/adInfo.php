
        <div class="main col-xs-50 col-lg-46 col-lg-offset-2">
	<a href="<?=site_url('ad/add')?>">Add New</a>
	<table id='exampletable'>
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Position</th>
                    <th>Duration</th>
                    <th>Specification</th>
                    <th></th><th></th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                    foreach ($ad as $add){
                        ?>
                <tr>
                    <td><?=$add->location;?></td><td><?=$add->type;?></td><td><?=$add->postion;?></td><td><?=$add->duration;?></td><td>Specification</td>
                    <td><a href="<?=site_url('ad/editAdInfo')."/$add->id";?>">Edit</a></td>
                    <td><a href="<?=site_url('ad/deleteAdInfo')."/$add->id";?>">Delete</a></td>
                </tr>
                        <?PHP
                    }
                ?>
            </tbody>
        </table>
</div>
<script type='text/javascript'>
            $(function () {
                $("#exampletable").slimtable({
                    colSettings: [
                        {colNumber: 5, enableSort: false, addClasses: ['customclass']},
                        {colNumber: 6, enableSort: false, addClasses: ['customclass']}
                    ]
                });
            });
        </script>