<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title><?PHP echo isset($tittle) ? $tittle : "Welcome To Hot Groups"; ?></title>
        <link rel="icon" href="<?PHP echo IMAGES_PATH ?>favicon.ico"/>
        <?PHP
        $this->load->view('hotcss/common');
        if (isset($style)) {
            foreach ($style as $val)
                $this->load->view('hotcss/' . $val);
        }
        $this->load->view('hotjs/common');
        if (isset($script)) {
            foreach ($script as $val)
                $this->load->view('hotjs/' . $val);
        }
        ?>
    </head>
    <body class="page" id="top">
        <div class="main col-xs-50 col-lg-46 col-lg-offset-2 col-xs-offset-1">
            <?PHP
            $this->load->view('hotincludes/header');
            ?>
            <div class="col-xs-50 content">
                <br>
            <?PHP
            if (isset($content)) {
                foreach ($content as $val)
                    $this->load->view('hotpages/' . $val);
            }
            ?>
                <?php $this->load->view("hotincludes/footer"); ?>
            </div>
            <?php //$this->load->view("includes/footer"); ?>
        </div>
    </body>