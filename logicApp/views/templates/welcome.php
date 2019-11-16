<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
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
    <body class="page1" id="top">
        
        <?PHP
            $this->load->view('includes/header');
            if (isset($content)) {
                foreach ($content as $val)
                    $this->load->view('pages/' . $val);
            }
            ?>
    </body>
</html>