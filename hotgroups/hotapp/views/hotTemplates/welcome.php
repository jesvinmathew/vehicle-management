<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title><?PHP echo isset($tittle) ? $tittle : "Welcome To Hot Groups"; ?></title>
        <link rel="icon" href="<?PHP echo IMAGES_PATH ?>favicon.ico"/>
        <?PHP
        $this->load->view('css/common');
        if (isset($style)) {
            foreach ($style as $val)
                $this->load->view('css/' . $val);
        }
        $this->load->view('js/common');
        if (isset($script)) {
            foreach ($script as $val)
                $this->load->view('js/' . $val);
        }
        ?>
    </head>
    <body class="page" id="top">
        <div class="main col-xs-50 col-lg-46 col-lg-offset-2" >
            <?PHP
            $this->load->view('includes/header');
            if (isset($content)) {
                foreach ($content as $val)
                    $this->load->view('pages/' . $val);
            }
            ?>
            <?php //$this->load->view("includes/footer"); ?>
        </div>
    </body>