
        <div class="main col-xs-50 col-lg-46 col-lg-offset-2">
	<a href="<?=site_url('admin/traficExcel')?>">Get Excel</a>
	<table id='exampletable'>
            <thead>
                <tr>
                    <th>I P</th>
                    <th>Page</th>
                    <th>User</th>
                    <th>Date and Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                    foreach ($trafic as $trr){
                        ?>
                <tr>
                    <td><?=$trr->ip;?></td><td><?=$trr->page;?></td><td><?=$trr->username;?></td><td><?=$trr->time;?></td>
                    <td><a href="<?=site_url('admin/deletetrafic')."/$trr->id";?>">Delete</a></td>
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
                        {colNumber: 4, enableSort: false, addClasses: ['customclass']}
                    ]
                });
            });
        </script>