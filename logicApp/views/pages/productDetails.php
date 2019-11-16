<div class="greeBg">
    <div class="row">
        <div class="medium-5 columns">
            <img src="<?= IMAGE_PATH ?>products/<?= $product[0]->image?>" />
        </div>
        <div class="medium-7 columns">
            <table>
                <tr>
                    <th colspan="2"><?= $product[0]->name; ?></th>
                </tr>
                <tr>
                    <td>Price</td>
                    <th><?= $product[0]->price; ?></th>
                </tr>
                <tr>
                    <td colspan="2"><?= nl2br($product[0]->discription); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
