<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <table align="center">
            <tr>
                <td>Country:</td>
                <td>
                    <select id="country" name="country" class="select required form-control">
                        <option value="0">Select</option>
                        <option value="-1">New</option>
                        <?PHP
                        foreach ($country as $cun){
                            echo "<option value='$cun->place_id'>$cun->placename</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="text" name="cuntryVal" id="cuntryVal" class="form-control" />
                    <input type="button" value="Procede" id="cuntPro" class="form-control" />
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <select id="state" name="state" class="select required form-control">
                        <option value="0">Select</option>
                        <option value="-1">New</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="text" name="stateVal" id="stateVal" class="form-control" />
                    <input type="button" value="Procede" id="statePro" class="form-control" />
                </td>
            </tr>
            <tr>
                <td>District</td><td>
                    <select id="district" name="district" class="select required form-control">
                        <option value="0">Select</option>
                        <option value="-1">New</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="text" name="districtVal" id="districtVal" class="form-control" />
                    <input type="button" value="Procede" id="districtPro" class="form-control" />
                </td>
            </tr>
            <tr>
                <td>Town</td><td>
                    <select id="town" name="town" class="select required form-control">
                        <option value="0">Select</option>
                        <option value="-1">New</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="text" name="townVal" id="townVal" class="form-control" />
                    <input type="button" value="Procede" id="townPro" class="form-control" />
                </td>
            </tr>
        </table>
    </div>
</div>